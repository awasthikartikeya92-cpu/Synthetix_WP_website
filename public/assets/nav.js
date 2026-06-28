// Injects shared nav and footer, and marks active nav link
(function () {
  const path = window.location.pathname;

  const nav = `
<nav class="nav">
  <div class="nav__inner">
    <a href="/" class="nav__logo">Synthetix<span>.</span></a>
    <ul class="nav__links">
      <li><a href="/solutions/" ${path.startsWith('/solutions') ? 'class="active"' : ''}>Solutions</a></li>
      <li><a href="/platform/" ${path.startsWith('/platform') ? 'class="active"' : ''}>Platform</a></li>
      <li><a href="/agents/"   ${path.startsWith('/agents')   ? 'class="active"' : ''}>Agents</a></li>
      <li><a href="/governance/" ${path.startsWith('/governance') ? 'class="active"' : ''}>Governance</a></li>
      <li><a href="/why/"      ${path.startsWith('/why')      ? 'class="active"' : ''}>Why Synthetix</a></li>
      <li><a href="/resources/" ${path.startsWith('/resources') ? 'class="active"' : ''}>Resources</a></li>
      <li><a href="/company/contact/" class="nav__cta">Request Demo</a></li>
    </ul>
    <div class="nav__toggle" onclick="this.closest('.nav').querySelector('.nav__links').style.display='flex';this.closest('.nav').querySelector('.nav__links').style.flexDirection='column';this.closest('.nav').querySelector('.nav__links').style.position='absolute';this.closest('.nav').querySelector('.nav__links').style.top='72px';this.closest('.nav').querySelector('.nav__links').style.left='0';this.closest('.nav').querySelector('.nav__links').style.right='0';this.closest('.nav').querySelector('.nav__links').style.background='#0B0B0B';this.closest('.nav').querySelector('.nav__links').style.padding='24px 32px';this.closest('.nav').querySelector('.nav__links').style.gap='20px';">
      <span></span><span></span><span></span>
    </div>
  </div>
</nav>`;

  const footer = `
<footer class="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__brand">
        <a href="/" class="nav__logo">Synthetix<span style="color:var(--color-primary)">.</span></a>
        <p class="footer__tagline" style="margin-top:14px">Governed agentic delivery for enterprise software programs. Nine specialist agents. One audit trail.</p>
      </div>
      <div>
        <p class="footer__col-title">Platform</p>
        <ul class="footer__links">
          <li><a href="/platform/#how">How It Works</a></li>
          <li><a href="/platform/#conductor">Conductor</a></li>
          <li><a href="/platform/#atlas">Atlas</a></li>
          <li><a href="/platform/#integrations">Integrations</a></li>
        </ul>
      </div>
      <div>
        <p class="footer__col-title">Solutions</p>
        <ul class="footer__links">
          <li><a href="/solutions/#greenfield">Greenfield</a></li>
          <li><a href="/solutions/#modernization">Modernization</a></li>
          <li><a href="/solutions/#app-support">App Support</a></li>
          <li><a href="/solutions/#infra-support">Infra Support</a></li>
        </ul>
      </div>
      <div>
        <p class="footer__col-title">Company</p>
        <ul class="footer__links">
          <li><a href="/why/">Why Synthetix</a></li>
          <li><a href="/governance/">Governance</a></li>
          <li><a href="/company/story/">Our Story</a></li>
          <li><a href="/company/contact/">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="footer__bottom">
      <span>© 2026 Synthetix. All rights reserved.</span>
      <span>SOC 2 Type II · GDPR · Air-gap ready</span>
    </div>
  </div>
</footer>`;

  document.body.insertAdjacentHTML('afterbegin', nav);
  document.body.insertAdjacentHTML('beforeend', footer);
})();
