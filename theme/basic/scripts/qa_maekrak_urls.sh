#!/usr/bin/env bash
# 맥락한의원 URL 스팟 QA — 사이트맵 + install + 홈 마커
# Usage: BASE_URL=https://headnerve.iwinv.net ./qa_maekrak_urls.sh

set -euo pipefail

BASE_URL="${BASE_URL:-https://headnerve.iwinv.net}"
BASE_URL="${BASE_URL%/}"
SITEMAP="${BASE_URL}/theme/basic/sitemap_maekrak.php"
INSTALL_URL="${BASE_URL}/install/"

fail=0
pass=0

check_url() {
  local url="$1"
  local expect="${2:-maekrak-}"
  local code body
  code=$(curl -sL --retry 2 --retry-delay 1 -o /tmp/qa_body.html -w "%{http_code}" "$url" || echo "000")
  body=$(cat /tmp/qa_body.html 2>/dev/null || true)
  if [[ "$code" != "200" ]]; then
    echo "FAIL HTTP $code $url"
    fail=$((fail + 1))
    return
  fi
  if [[ -n "$expect" ]] && ! echo "$body" | grep -q "$expect"; then
    echo "WARN HTTP 200 but missing '$expect' $url"
    fail=$((fail + 1))
    return
  fi
  echo "OK   $url"
  pass=$((pass + 1))
}

echo "=== Sitemap URLs ($SITEMAP) ==="
loc_count=0
while IFS= read -r loc; do
  [[ -z "$loc" ]] && continue
  loc_count=$((loc_count + 1))
  marker="maekrak-"
  if [[ "$loc" == *"/board.php"* ]]; then
    marker=""
  fi
  if [[ "$loc" == *"co_id=headache" ]] || [[ "$loc" == *"co_id=dizziness" ]] || \
     [[ "$loc" == *"co_id=autonomic" ]] || [[ "$loc" == *"co_id=peripheral" ]] || \
     [[ "$loc" == *"co_id=brainfog" ]]; then
    check_url "$loc" "FAQPage"
  elif [[ "$loc" == "${BASE_URL}/" ]] || [[ "$loc" == "${BASE_URL}" ]]; then
    check_url "$loc" "maekrak-home"
    code=$(curl -sL -A "Mozilla/5.0 (iPhone)" -o /dev/null -w "%{http_code}" "$loc" || echo "000")
    body=$(curl -sL -A "Mozilla/5.0 (iPhone)" "$loc" 2>/dev/null || true)
    if [[ "$code" == "200" ]] && echo "$body" | grep -q 'maekrak-mobile-cta'; then
      echo "OK   $loc (mobile UA: CTA present)"
      pass=$((pass + 1))
    else
      echo "WARN mobile home missing maekrak-mobile-cta $loc"
      fail=$((fail + 1))
    fi
  else
    check_url "$loc" "$marker"
  fi
done < <(curl -sL "$SITEMAP" | sed -n 's:.*<loc>\([^<]*\)</loc>.*:\1:p')

if [[ "$loc_count" -eq 0 ]]; then
  echo "FAIL could not parse sitemap"
  exit 1
fi
echo "Checked $loc_count sitemap URLs"

echo ""
echo "=== Install directory (should be blocked or 404 on production) ==="
install_code=$(curl -sL -o /dev/null -w "%{http_code}" "$INSTALL_URL" || echo "000")
if [[ "$install_code" == "200" ]]; then
  echo "WARN install/ returns HTTP 200 — delete install folder on server"
  fail=$((fail + 1))
else
  echo "OK   install/ HTTP $install_code (not openly serving installer)"
  pass=$((pass + 1))
fi

echo ""
echo "=== robots.txt ==="
robots_code=$(curl -sL -o /tmp/qa_robots.txt -w "%{http_code}" "${BASE_URL}/robots.txt" || echo "000")
if [[ "$robots_code" == "200" ]] && grep -q "sitemap_maekrak" /tmp/qa_robots.txt 2>/dev/null; then
  echo "OK   robots.txt lists sitemap"
  pass=$((pass + 1))
else
  echo "FAIL robots.txt HTTP $robots_code or missing sitemap line"
  fail=$((fail + 1))
fi

echo ""
echo "=== Summary: $pass passed, $fail failed/warned ==="
[[ "$fail" -eq 0 ]] && exit 0 || exit 1
