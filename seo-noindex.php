<?php
/**
 * 잔여 다국어 URL 등 — 검색 제외용 404
 * .htaccess 에서 /en, /zh-hans 로 rewrite
 */
http_response_code(404);
header('Content-Type: text/html; charset=utf-8');
header('X-Robots-Tag: noindex, nofollow');
?><!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>페이지를 찾을 수 없습니다</title>
</head>
<body>
<p>요청하신 페이지를 찾을 수 없습니다.</p>
<p><a href="/">홈으로 이동</a></p>
</body>
</html>
