'use strict';

(function () {

  /* ============================================
     Header: Scroll State
     ============================================ */
  const header = document.getElementById('masthead');
  if (header) {
    const isTransparent = header.classList.contains('is-transparent');

    function updateHeaderState() {
      if (!isTransparent) return;
      if (window.scrollY > 60) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    }

    window.addEventListener('scroll', updateHeaderState, { passive: true });
    updateHeaderState();
  }

  /* ============================================
     Header Color: Section-based switching
     ============================================ */
  if (header) {
    var colorSections = Array.from(document.querySelectorAll('.hero, section[id]'));

    function isDarkSection(section) {
      return section.classList.contains('section--dark') ||
             section.classList.contains('hero') ||
             section.classList.contains('contact-banner');
    }

    function updateHeaderColor() {
      var sensorY = window.scrollY + header.offsetHeight + 1;
      var active = null;

      for (var i = colorSections.length - 1; i >= 0; i--) {
        var top = colorSections[i].getBoundingClientRect().top + window.scrollY;
        if (sensorY >= top) {
          active = colorSections[i];
          break;
        }
      }

      header.classList.toggle('header--light', active !== null && !isDarkSection(active));
    }

    window.addEventListener('scroll', updateHeaderColor, { passive: true });
    updateHeaderColor();
  }

  /* ============================================
     Mobile Menu
     ============================================ */
  const hamburger     = document.getElementById('hamburger-btn');
  const mobileMenu    = document.getElementById('mobile-menu');
  const menuClose     = document.getElementById('mobile-menu-close');

  function openMenu() {
    if (!mobileMenu || !hamburger) return;
    mobileMenu.removeAttribute('hidden');
    mobileMenu.classList.add('is-open');
    hamburger.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    menuClose && menuClose.focus();
  }

  function closeMenu() {
    if (!mobileMenu || !hamburger) return;
    mobileMenu.classList.remove('is-open');
    mobileMenu.setAttribute('hidden', '');
    hamburger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
    hamburger.focus();
  }

  hamburger && hamburger.addEventListener('click', openMenu);
  menuClose  && menuClose.addEventListener('click', closeMenu);

  // Close on outside click
  mobileMenu && mobileMenu.addEventListener('click', function (e) {
    if (e.target === mobileMenu) closeMenu();
  });

  // Close on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('is-open')) {
      closeMenu();
    }
  });

  /* ============================================
     Fade-in on Scroll (IntersectionObserver)
     ============================================ */
  const fadeElements = document.querySelectorAll('.fade-in');

  if (fadeElements.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          const delay = entry.target.style.getPropertyValue('--delay') || '0s';
          entry.target.style.transitionDelay = delay;
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px',
    });

    fadeElements.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    // Fallback: show all immediately
    fadeElements.forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  /* ============================================
     Smooth Scroll + Fade-in reveal for Anchor Links
     ============================================ */
  function revealFadeIn(section) {
    if (!section) return;
    section.querySelectorAll('.fade-in').forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href').slice(1);
      if (!targetId) return;
      const target = document.getElementById(targetId);
      if (!target) return;

      // フェードイン要素を即座に表示
      revealFadeIn(target);

      // ヘッダー高さを考慮してスムーズスクロール
      e.preventDefault();
      const headerHeight = header ? header.offsetHeight : 0;
      const targetTop = target.getBoundingClientRect().top + window.scrollY - headerHeight - 24;
      window.scrollTo({ top: targetTop, behavior: 'smooth' });
    });
  });

  /* ============================================
     Hash Jump on Page Load (/?#section からの遷移)
     ============================================ */
  (function () {
    const hash = window.location.hash;
    if (!hash) return;

    window.addEventListener('load', function () {
      const target = document.querySelector(hash);
      if (!target) return;

      // 対象セクション内の .fade-in を即座に表示
      revealFadeIn(target);

      // ヘッダー高さを考慮してスクロール（レイアウト確定後に実行）
      const headerHeight = header ? header.offsetHeight : 0;
      setTimeout(function () {
        const targetTop = target.getBoundingClientRect().top + window.scrollY - headerHeight - 24;
        window.scrollTo({ top: targetTop, behavior: 'smooth' });
      }, 80);
    });
  }());

  /* ============================================
     Contact Form: Basic Client-side Validation
     ============================================ */
  const contactForm = document.querySelector('.reinoa-contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      const requiredFields = contactForm.querySelectorAll('[required]');
      let isValid = true;

      requiredFields.forEach(function (field) {
        field.style.borderColor = '';
        if (!field.value.trim() || (field.type === 'checkbox' && !field.checked)) {
          field.style.borderColor = '#e53e3e';
          isValid = false;
        }
      });

      if (!isValid) {
        e.preventDefault();
        const firstInvalid = contactForm.querySelector('[required]');
        if (firstInvalid) firstInvalid.focus();
        alert('必須項目をすべてご入力ください。');
      }
    });
  }

  /* ============================================
     Stats Counter Animation
     ============================================ */
  function animateCounter(el) {
    const text   = el.textContent.trim();
    const match  = text.match(/(\d+)/);
    if (!match) return;

    const target   = parseInt(match[1], 10);
    const suffix   = text.replace(/[\d,]/g, '').trim();
    const prefix   = text.indexOf(match[1]) > 0 ? text.slice(0, text.indexOf(match[1])) : '';
    const duration = 1800;
    const start    = performance.now();

    function update(now) {
      const elapsed  = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const eased    = 1 - Math.pow(1 - progress, 3);
      const current  = Math.round(eased * target);
      el.textContent = prefix + current.toLocaleString() + suffix;
      if (progress < 1) requestAnimationFrame(update);
    }

    requestAnimationFrame(update);
  }

  const statsSection = document.querySelector('.section--dark');
  if (statsSection && 'IntersectionObserver' in window) {
    const statsObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.querySelectorAll('p[style*="font-size:clamp"]').forEach(animateCounter);
          statsObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    statsObserver.observe(statsSection);
  }

  /* ============================================
     Current Year in Footer
     ============================================ */
  document.querySelectorAll('.footer-copy').forEach(function (el) {
    const yearMatch = el.innerHTML.match(/&copy;\s*(\d{4})/);
    if (yearMatch) {
      const currentYear = new Date().getFullYear();
      el.innerHTML = el.innerHTML.replace(yearMatch[1], currentYear);
    }
  });

})();
