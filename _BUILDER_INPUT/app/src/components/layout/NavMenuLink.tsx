import { Link } from 'react-router-dom';
import { isExternalNavHref } from '../../lib/boardUrls';

type NavMenuLinkProps = {
  href: string;
  external?: boolean;
  className?: string;
  onClick?: () => void;
  children: React.ReactNode;
};

export function NavMenuLink({ href, external, className, onClick, children }: NavMenuLinkProps) {
  if (external || isExternalNavHref(href)) {
    return (
      <a href={href} className={className} onClick={onClick}>
        {children}
      </a>
    );
  }

  return (
    <Link to={href} className={className} onClick={onClick}>
      {children}
    </Link>
  );
}
