<?php

namespace Database\Seeders;

use App\Models\Demo;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $htmlContent = <<<'HTML'
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DM&P Advocates — Corporate & Commercial Law Firm (SSEK & Makarim Tier-1 Standard)</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Playfair+Display:ital,wght@0,600;1,400;1,600&display=swap" rel="stylesheet">
  <style>
    :root {
      --color-bg: #f7fbff;
      --color-surface: #ffffff;
      --color-blue: #2f4e9b;
      --color-lblue: #58b0e3;
      --color-dblue: #223a76;
      --color-navy-dark: #17284d;
      --color-gold: #b89745;
      --color-gold-light: #fcf9f2;
      --color-black: #57595f;
      --color-dark: #22262f;
      --color-muted: #8a9ba8;
      --color-border: #e5edf5;
      --color-border-subtle: rgba(87, 89, 95, 0.15);
      --font-main: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      --font-serif: 'Playfair Display', Georgia, serif;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: var(--color-bg);
      font-family: var(--font-main);
      font-weight: 400;
      font-size: 15px;
      line-height: 1.7em;
      color: var(--color-black);
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
    }

    a {
      color: var(--color-blue);
      text-decoration: none;
      transition: 250ms color ease;
    }

    a:hover {
      color: var(--color-dblue);
    }

    .container {
      max-width: 1440px;
      margin: 0 auto;
      padding: 0 40px;
    }

    /* ==================== TOP UTILITY BAR ==================== */
    .top-bar {
      background: var(--color-bg);
      border-bottom: 1px solid var(--color-border);
      font-size: 12.5px;
      color: var(--color-black);
      padding: 8px 0;
      letter-spacing: 0.05em;
    }

    .top-bar-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-bar-left span {
      margin-right: 24px;
    }

    .top-bar-left strong {
      color: var(--color-dblue);
    }

    .top-bar-right {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .lang-switcher {
      display: flex;
      align-items: center;
      gap: 6px;
      font-weight: 600;
    }

    .lang-btn {
      padding: 2px 6px;
      cursor: pointer;
      border-radius: 3px;
      font-size: 11.5px;
      color: var(--color-muted);
    }

    .lang-btn.active {
      color: var(--color-dblue);
      background: rgba(34, 58, 118, 0.08);
    }

    /* ==================== MAIN HEADER & NAVBAR ==================== */
    header.main-header {
      background: var(--color-surface);
      border-bottom: 1px solid var(--color-border);
      position: sticky;
      top: 0;
      z-index: 1000;
      transition: 300ms box-shadow;
    }

    .header-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 80px;
    }

    .logo-link {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }

    .logo-icon-badge {
      height: 46px;
      width: 46px;
      border-radius: 4px;
      background: var(--color-dblue);
      color: #ffffff;
      border: 1px solid var(--color-gold);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 17px;
      letter-spacing: -0.02em;
    }

    .logo-text-box {
      display: flex;
      flex-direction: column;
    }

    .logo-title {
      font-size: 22px;
      font-weight: 800;
      letter-spacing: -0.02em;
      color: var(--color-dblue);
      line-height: 1.1;
    }

    .logo-title span.gold {
      color: var(--color-gold);
    }

    .logo-subtitle {
      font-size: 10.5px;
      font-weight: 600;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--color-muted);
      margin-top: 2px;
    }

    nav.main-nav {
      display: flex;
      align-items: center;
      gap: 28px;
    }

    .nav-item {
      font-size: 12.5px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      color: var(--color-dblue);
      opacity: 0.75;
      padding: 8px 0;
      position: relative;
      cursor: pointer;
      transition: 200ms opacity, 200ms color;
    }

    .nav-item:hover, .nav-item.active {
      opacity: 1;
      color: var(--color-dblue);
    }

    .nav-item.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background: var(--color-gold);
    }

    .btn-cta {
      background: var(--color-dblue);
      color: #ffffff !important;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      padding: 12px 24px;
      border-radius: 4px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: 250ms background, 250ms transform;
      cursor: pointer;
      border: none;
    }

    .btn-cta:hover {
      background: var(--color-blue);
      transform: translateY(-1px);
    }

    .btn-secondary {
      background: transparent;
      color: var(--color-dblue) !important;
      border: 1px solid var(--color-dblue);
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.12em;
      padding: 12px 24px;
      border-radius: 4px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: 250ms all;
      cursor: pointer;
    }

    .btn-secondary:hover {
      background: rgba(34, 58, 118, 0.05);
      border-color: var(--color-blue);
    }

    /* ==================== VIEW CONTAINERS ==================== */
    .view-section {
      display: none;
    }

    .view-section.active-view {
      display: block;
      animation: fadeIn 350ms ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(6px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ==================== HERO SECTION ==================== */
    .hero-section {
      background: linear-gradient(180deg, #f7fbff 0%, #edf4fc 100%);
      padding: 90px 0 70px;
      border-bottom: 1px solid var(--color-border);
      position: relative;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.15fr 0.85fr;
      gap: 60px;
      align-items: center;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--color-gold-light);
      border: 1px solid rgba(184, 151, 69, 0.35);
      color: var(--color-gold);
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 3px;
      margin-bottom: 24px;
    }

    .hero-title {
      font-size: 46px;
      font-weight: 800;
      line-height: 1.25;
      letter-spacing: -0.02em;
      color: var(--color-dblue);
      margin-bottom: 22px;
    }

    .hero-title span.accent {
      color: var(--color-blue);
    }

    .hero-desc {
      font-size: 16px;
      line-height: 1.75em;
      color: var(--color-black);
      margin-bottom: 34px;
      max-width: 620px;
    }

    .hero-actions {
      display: flex;
      gap: 16px;
      align-items: center;
      margin-bottom: 44px;
    }

    .hero-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      border-top: 1px solid var(--color-border);
      padding-top: 28px;
    }

    .stat-item h4 {
      font-size: 30px;
      font-weight: 800;
      color: var(--color-dblue);
      line-height: 1;
      margin-bottom: 6px;
    }

    .stat-item h4 span.gold {
      color: var(--color-gold);
    }

    .stat-item p {
      font-size: 12.5px;
      color: var(--color-muted);
      line-height: 1.4;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-weight: 600;
      margin: 0;
    }

    /* Hero Right Editorial Quote Card */
    .hero-quote-card {
      background: var(--color-surface);
      border: 1px solid var(--color-border);
      border-left: 4px solid var(--color-gold);
      padding: 40px;
      border-radius: 4px;
      box-shadow: 0 12px 36px rgba(34, 58, 118, 0.06);
    }

    .hero-quote-text {
      font-family: var(--font-serif);
      font-size: 19px;
      line-height: 1.65;
      color: var(--color-navy-dark);
      font-style: italic;
      margin-bottom: 24px;
    }

    .hero-quote-author {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .author-avatar {
      width: 54px;
      height: 54px;
      border-radius: 50%;
      background: var(--color-dblue);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 18px;
    }

    .author-info h5 {
      font-size: 15px;
      font-weight: 700;
      color: var(--color-dblue);
      margin-bottom: 2px;
    }

    .author-info p {
      font-size: 12.5px;
      color: var(--color-gold);
      font-weight: 600;
      margin: 0;
    }

    /* ==================== ACCOLADES BENCHMARK STRIP ==================== */
    .accolades-strip {
      background: var(--color-surface);
      border-bottom: 1px solid var(--color-border);
      padding: 30px 0;
    }

    .accolades-grid {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 24px;
    }

    .accolade-item {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .accolade-badge {
      background: var(--color-gold-light);
      border: 1px solid rgba(184, 151, 69, 0.4);
      color: var(--color-gold);
      font-weight: 800;
      font-size: 11px;
      padding: 4px 8px;
      border-radius: 3px;
    }

    .accolade-text strong {
      display: block;
      font-size: 13.5px;
      font-weight: 700;
      color: var(--color-dblue);
    }

    .accolade-text span {
      font-size: 11.5px;
      color: var(--color-muted);
    }

    /* ==================== SECTION TITLE HEADERS ==================== */
    .section-header {
      text-align: center;
      max-width: 760px;
      margin: 0 auto 54px;
    }

    .section-tag {
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.18em;
      color: var(--color-gold);
      margin-bottom: 10px;
      display: block;
    }

    .section-title {
      font-size: 34px;
      font-weight: 800;
      color: var(--color-dblue);
      line-height: 1.3;
      margin-bottom: 16px;
    }

    .section-subtitle {
      font-size: 15.5px;
      color: var(--color-black);
      line-height: 1.7;
    }

    /* ==================== PRACTICE AREAS MATRIX ==================== */
    .practices-section {
      padding: 85px 0;
      background: var(--color-bg);
    }

    .practices-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .practice-card {
      background: var(--color-surface);
      border: 1px solid var(--color-border);
      padding: 34px;
      border-radius: 4px;
      transition: 250ms all ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .practice-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(34, 58, 118, 0.08);
      border-color: rgba(34, 58, 118, 0.3);
    }

    .practice-icon-box {
      width: 44px;
      height: 44px;
      background: rgba(34, 58, 118, 0.06);
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      margin-bottom: 20px;
    }

    .practice-card h4 {
      font-size: 18px;
      font-weight: 700;
      color: var(--color-dblue);
      margin-bottom: 12px;
    }

    .practice-card p {
      font-size: 14px;
      color: var(--color-black);
      line-height: 1.65;
      margin-bottom: 22px;
      flex-grow: 1;
    }

    .practice-card-link {
      font-size: 12.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: var(--color-gold);
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .practice-card-link:hover {
      color: var(--color-dblue);
    }

    /* ==================== LAWYERS DIRECTORY ==================== */
    .lawyers-section {
      padding: 85px 0;
      background: var(--color-surface);
      border-top: 1px solid var(--color-border);
    }

    .filter-bar {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-bottom: 44px;
      flex-wrap: wrap;
    }

    .filter-pill {
      background: var(--color-bg);
      border: 1px solid var(--color-border);
      color: var(--color-black);
      font-size: 12.5px;
      font-weight: 600;
      padding: 8px 18px;
      border-radius: 30px;
      cursor: pointer;
      transition: 200ms all;
    }

    .filter-pill:hover, .filter-pill.active {
      background: var(--color-dblue);
      color: #ffffff;
      border-color: var(--color-dblue);
    }

    .lawyers-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 28px;
    }

    .lawyer-card {
      background: var(--color-bg);
      border: 1px solid var(--color-border);
      border-radius: 4px;
      overflow: hidden;
      transition: 250ms all;
      cursor: pointer;
    }

    .lawyer-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 32px rgba(34, 58, 118, 0.08);
      border-color: rgba(34, 58, 118, 0.3);
    }

    .lawyer-photo-placeholder {
      height: 260px;
      background: #e2eaf2;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .lawyer-photo-placeholder span.badge-rank {
      position: absolute;
      top: 14px;
      right: 14px;
      background: var(--color-dblue);
      color: #ffffff;
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 10px;
      border-radius: 3px;
    }

    .lawyer-card-body {
      padding: 24px;
    }

    .lawyer-card-body h4 {
      font-size: 16.5px;
      font-weight: 700;
      color: var(--color-dblue);
      margin-bottom: 4px;
    }

    .lawyer-card-body .role {
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--color-gold);
      margin-bottom: 12px;
      display: block;
    }

    .lawyer-card-body .specs {
      font-size: 13px;
      color: var(--color-black);
      line-height: 1.5;
      margin-bottom: 16px;
    }

    .lawyer-card-body .email-link {
      font-size: 12px;
      color: var(--color-blue);
      font-weight: 600;
      display: block;
    }

    /* ==================== INSIGHTS SECTION ==================== */
    .insights-section {
      padding: 85px 0;
      background: var(--color-bg);
      border-top: 1px solid var(--color-border);
    }

    .insights-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .insight-card {
      background: var(--color-surface);
      border: 1px solid var(--color-border);
      border-radius: 4px;
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: 250ms all;
    }

    .insight-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(34, 58, 118, 0.06);
    }

    .insight-meta {
      display: flex;
      justify-content: space-between;
      font-size: 11.5px;
      color: var(--color-muted);
      font-weight: 600;
      margin-bottom: 14px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .insight-meta span.cat {
      color: var(--color-blue);
      font-weight: 700;
    }

    .insight-card h4 {
      font-size: 17px;
      font-weight: 700;
      color: var(--color-dblue);
      line-height: 1.4;
      margin-bottom: 12px;
    }

    .insight-card p {
      font-size: 13.5px;
      color: var(--color-black);
      line-height: 1.6;
      margin-bottom: 20px;
      flex-grow: 1;
    }

    /* ==================== CONTACT & SCBD SECTION ==================== */
    .contact-section {
      padding: 85px 0;
      background: var(--color-surface);
      border-top: 1px solid var(--color-border);
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 50px;
      align-items: start;
    }

    .contact-info-box h3 {
      font-size: 26px;
      font-weight: 800;
      color: var(--color-dblue);
      margin-bottom: 18px;
    }

    .contact-info-box p {
      font-size: 14.5px;
      color: var(--color-black);
      margin-bottom: 28px;
    }

    .hq-card {
      background: var(--color-bg);
      border: 1px solid var(--color-border);
      border-left: 3px solid var(--color-gold);
      padding: 24px;
      border-radius: 4px;
      margin-bottom: 24px;
    }

    .hq-card h5 {
      font-size: 14.5px;
      font-weight: 700;
      color: var(--color-dblue);
      margin-bottom: 8px;
    }

    .hq-card p {
      font-size: 13px;
      color: var(--color-black);
      line-height: 1.6;
      margin-bottom: 0;
    }

    .form-box {
      background: var(--color-bg);
      border: 1px solid var(--color-border);
      padding: 36px;
      border-radius: 4px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--color-dblue);
      margin-bottom: 6px;
    }

    .form-control {
      width: 100%;
      padding: 12px 14px;
      font-family: var(--font-main);
      font-size: 13.5px;
      border: 1px solid var(--color-border);
      border-radius: 3px;
      background: #ffffff;
      color: var(--color-dark);
      outline: none;
      transition: 200ms border-color;
    }

    .form-control:focus {
      border-color: var(--color-blue);
    }

    /* ==================== FOOTER ==================== */
    footer.main-footer {
      background: var(--color-dblue);
      color: #ffffff;
      padding: 70px 0 30px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1.4fr 1fr 1fr 1fr;
      gap: 40px;
      margin-bottom: 50px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      padding-bottom: 40px;
    }

    .footer-col h5 {
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      color: var(--color-gold);
      margin-bottom: 20px;
    }

    .footer-col p {
      font-size: 13px;
      color: rgba(255, 255, 255, 0.75);
      line-height: 1.7;
    }

    .footer-col ul {
      list-style: none;
    }

    .footer-col ul li {
      margin-bottom: 10px;
    }

    .footer-col ul li a {
      color: rgba(255, 255, 255, 0.8);
      font-size: 13px;
      transition: 200ms color;
    }

    .footer-col ul li a:hover {
      color: #ffffff;
    }

    .footer-bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 12px;
      color: rgba(255, 255, 255, 0.6);
    }

    .footer-bottom strong {
      color: #ffffff;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
      .hero-grid, .contact-grid {
        grid-template-columns: 1fr;
      }
      .practices-grid, .insights-grid {
        grid-template-columns: 1fr 1fr;
      }
      .lawyers-grid {
        grid-template-columns: 1fr 1fr;
      }
      .footer-grid {
        grid-template-columns: 1fr 1fr;
      }
      nav.main-nav {
        display: none;
      }
    }

    @media (max-width: 600px) {
      .practices-grid, .insights-grid, .lawyers-grid, .footer-grid {
        grid-template-columns: 1fr;
      }
      .hero-title {
        font-size: 32px;
      }
      .container {
        padding: 0 20px;
      }
    }
  </style>
</head>
<body>

  <!-- ==================== TOP CONTACT UTILITY BAR ==================== -->
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-inner">
        <div class="top-bar-left">
          <span>📍 <strong>SCBD Office:</strong> Pacific Century Place Level 17, SCBD Jakarta</span>
          <span>📞 <strong>Tel:</strong> +62 21 5088 8899</span>
        </div>
        <div class="top-bar-right">
          <div class="lang-switcher">
            <span class="lang-btn active" id="btn-en" onclick="setLang('EN')">EN</span>
            <span>|</span>
            <span class="lang-btn" id="btn-id" onclick="setLang('ID')">ID</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ==================== MAIN HEADER & NAVIGATION ==================== -->
  <header class="main-header">
    <div class="container">
      <div class="header-wrapper">
        <a href="javascript:void(0)" class="logo-link" onclick="switchTab('home')">
          <div class="logo-icon-badge">DM&P</div>
          <div class="logo-text-box">
            <div class="logo-title">DM<span class="gold">&</span>P Advocates</div>
            <div class="logo-subtitle">Dhoni Martien & Partners</div>
          </div>
        </a>
        <nav class="main-nav">
          <div class="nav-item active" id="nav-home" onclick="switchTab('home')">Home</div>
          <div class="nav-item" id="nav-practices" onclick="switchTab('practices')">Practice Areas</div>
          <div class="nav-item" id="nav-lawyers" onclick="switchTab('lawyers')">Our Lawyers</div>
          <div class="nav-item" id="nav-insights" onclick="switchTab('insights')">Insights</div>
          <div class="nav-item" id="nav-rankings" onclick="switchTab('rankings')">Rankings</div>
          <div class="nav-item" id="nav-contact" onclick="switchTab('contact')">Contact</div>
        </nav>
        <div>
          <button class="btn-cta" onclick="switchTab('contact')">Schedule Consultation</button>
        </div>
      </div>
    </div>
  </header>

  <!-- ==================== 1. HOMEPAGE VIEW ==================== -->
  <main id="view-home" class="view-section active-view">
    
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container">
        <div class="hero-grid">
          <div class="hero-content">
            <div class="hero-tag">⚖️ Premier Indonesian Law Firm</div>
            <h1 class="hero-title">Trusted Legal Counsel for Indonesia's <span class="accent">Complex Commercial Mandates.</span></h1>
            <p class="hero-desc">DM&P Advocates provides decisive cross-border M&A advisory, contentious dispute resolution, and regulatory compliance for global multinationals and market leaders.</p>
            <div class="hero-actions">
              <button class="btn-cta" onclick="switchTab('practices')">View Practice Areas →</button>
              <button class="btn-secondary" onclick="switchTab('lawyers')">Meet Our Partners</button>
            </div>
            <div class="hero-stats">
              <div class="stat-item">
                <h4>25<span class="gold">+</span></h4>
                <p>Years Combined Partner Record</p>
              </div>
              <div class="stat-item">
                <h4>$4.2<span class="gold">B+</span></h4>
                <p>Transactions Advised</p>
              </div>
              <div class="stat-item">
                <h4>98<span class="gold">%</span></h4>
                <p>Dispute Resolution Mandate Win</p>
              </div>
            </div>
          </div>
          <div class="hero-sidebar">
            <div class="hero-quote-card">
              <div class="hero-quote-text">
                "In navigating Indonesia's dynamic legal landscape, commercial pragmatism and uncompromising integrity are the cornerstones of successful enterprise execution."
              </div>
              <div class="hero-quote-author">
                <div class="author-avatar">DM</div>
                <div class="author-info">
                  <h5>Dhoni Martien, S.H., LL.M.</h5>
                  <p>Managing Partner | DM&P Advocates</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Accolades Ribbon -->
    <section class="accolades-strip">
      <div class="container">
        <div class="accolades-grid">
          <div class="accolade-item">
            <div class="accolade-badge">TIER 1</div>
            <div class="accolade-text">
              <strong>The Legal 500 Asia Pacific</strong>
              <span>Corporate and M&A / Commercial Disputes</span>
            </div>
          </div>
          <div class="accolade-item">
            <div class="accolade-badge">LEADING</div>
            <div class="accolade-text">
              <strong>Chambers and Partners</strong>
              <span>Banking & Project Finance Advisory</span>
            </div>
          </div>
          <div class="accolade-item">
            <div class="accolade-badge">OUTSTANDING</div>
            <div class="accolade-text">
              <strong>Asialaw Profiles</strong>
              <span>Energy, Mining & Infrastructure</span>
            </div>
          </div>
          <div class="accolade-item">
            <div class="accolade-badge">FINALIST</div>
            <div class="accolade-text">
              <strong>ALB Indonesia Law Awards</strong>
              <span>Corporate Law Firm of the Year</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Core Practices Highlights -->
    <section class="practices-section">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Areas of Expertise</span>
          <h2 class="section-title">Comprehensive Legal Advisory for Enterprise Scale</h2>
          <p class="section-subtitle">We advise multinational corporations, financial institutions, and government agencies across critical economic sectors in Indonesia.</p>
        </div>
        <div class="practices-grid">
          <div class="practice-card">
            <div class="practice-icon-box">🤝</div>
            <h4>Corporate & Cross-Border M&A</h4>
            <p>High-stakes equity acquisitions, joint ventures, BKPM direct investment, and KPPU antitrust notifications.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">⚖️</div>
            <h4>Commercial Litigation & BANI</h4>
            <p>Complex business disputes, bankruptcy (PKPU), and international arbitration under BANI, SIAC, and ICC rules.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">🏦</div>
            <h4>Banking, Finance & Fintech</h4>
            <p>Syndicated credit facilities, project bond issuances, and regulatory licensing under OJK and Bank Indonesia.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">⚡</div>
            <h4>Energy, Mining & Infrastructure</h4>
            <p>Mining IUP concession acquisitions, renewable energy solar/hydro PPAs, and PLN utility regulatory compliance.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">🔐</div>
            <h4>TMT & Data Privacy (UU PDP)</h4>
            <p>Digital platform compliance, enterprise data privacy audit under UU PDP, and intellectual property enforcement.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">👔</div>
            <h4>Employment & Industrial Relations</h4>
            <p>Executive severance, collective labor agreements (PKB), and dispute representation at Pengadilan Hubungan Industrial.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Latest Insights Preview -->
    <section class="insights-section">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Legal Intelligence</span>
          <h2 class="section-title">Authoritative Legal Alerts & Bulletins</h2>
          <p class="section-subtitle">Actionable analysis on Indonesian regulatory reforms authored directly by DM&P partners.</p>
        </div>
        <div class="insights-grid">
          <div class="insight-card">
            <div>
              <div class="insight-meta">
                <span class="cat">DATA PRIVACY</span>
                <span>AUG 2026 • 5 MIN READ</span>
              </div>
              <h4>Mandatory Compliance Audit Under Indonesia's PDP Law Enforcement</h4>
              <p>Critical steps for corporate data controllers regarding cross-border transfer mechanisms and mandatory Data Protection Officer (DPO) appointments.</p>
            </div>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('insights')">Read Legal Alert →</a>
          </div>
          <div class="insight-card">
            <div>
              <div class="insight-meta">
                <span class="cat">ANTITRUST</span>
                <span>JUL 2026 • 4 MIN READ</span>
              </div>
              <h4>KPPU's Stricter Digital Merger Thresholds & Post-Closing Notifications</h4>
              <p>Key takeaways on asset calculation rules and penalty mitigations for multi-tier international acquisitions in Indonesia.</p>
            </div>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('insights')">Read Legal Alert →</a>
          </div>
          <div class="insight-card">
            <div>
              <div class="insight-meta">
                <span class="cat">ENERGY IPP</span>
                <span>JUN 2026 • 6 MIN READ</span>
              </div>
              <h4>Commercial Structures for Solar & Hydro Power Purchase Agreements (PPA)</h4>
              <p>Analysis of Ministry of Energy & Mineral Resources tariffs, bankability clauses, and PLN grid off-take obligations.</p>
            </div>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('insights')">Read Legal Alert →</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ==================== 2. PRACTICE AREAS VIEW ==================== -->
  <main id="view-practices" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Practice Directory</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Full Spectrum Corporate Legal Capabilities</h1>
        <p class="hero-desc">Explore 12 specialized practice groups dedicated to serving institutional clients with commercial rigor and precision.</p>
      </div>
    </section>
    <section class="practices-section">
      <div class="container">
        <div class="practices-grid">
          <div class="practice-card">
            <div class="practice-icon-box">01</div>
            <h4>Corporate & M&A</h4>
            <p>Comprehensive representation in mergers, acquisitions, share divestments, and corporate reorganizations under Indonesian Company Law.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('contact')">Consult Partner →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">02</div>
            <h4>Banking & Structured Finance</h4>
            <p>Bilateral loans, syndicated debt facilities, mezzanine financing, and security creation with OJK and BI compliance.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('contact')">Consult Partner →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">03</div>
            <h4>Commercial Litigation & Trial</h4>
            <p>Advocacy before District Courts, High Courts, and the Supreme Court (Mahkamah Agung) for high-stakes business controversies.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('contact')">Consult Partner →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">04</div>
            <h4>Arbitration & Alternative Dispute (ADR)</h4>
            <p>Domestic and cross-border arbitration before BANI (Badan Arbitrase Nasional Indonesia), SIAC, and ICC tribunals.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('contact')">Consult Partner →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">05</div>
            <h4>Insolvency, Restructuring & PKPU</h4>
            <p>Debt moratorium filings (PKPU), creditor representation, composition plan negotiations, and formal bankruptcy administration.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('contact')">Consult Partner →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">06</div>
            <h4>Foreign Direct Investment (BKPM)</h4>
            <p>Navigating the Positive Investment List (Perpres 10/2021), PT PMA incorporation, OSS-RBA licensing, and tax incentives.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('contact')">Consult Partner →</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ==================== 3. OUR LAWYERS VIEW ==================== -->
  <main id="view-lawyers" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Attorneys & Counsel</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Distinguished Advocates & Sector Leaders</h1>
        <p class="hero-desc">Meet our partners and senior counsel with licensed bar admissions and deep expertise across Indonesian commercial practice.</p>
      </div>
    </section>
    <section class="lawyers-section">
      <div class="container">
        <div class="filter-bar">
          <div class="filter-pill active" onclick="filterLawyers('all', this)">All Ranks</div>
          <div class="filter-pill" onclick="filterLawyers('managing', this)">Managing Partner</div>
          <div class="filter-pill" onclick="filterLawyers('partner', this)">Partners</div>
        </div>
        <div class="lawyers-grid">
          <div class="lawyer-card" data-rank="managing" onclick="switchTab('contact')">
            <div class="lawyer-photo-placeholder">
              <span style="font-size: 38px; color: var(--color-dblue);">⚖️</span>
              <span class="badge-rank">Managing Partner</span>
            </div>
            <div class="lawyer-card-body">
              <h4>Dhoni Martien, S.H., LL.M.</h4>
              <span class="role">Managing Partner</span>
              <p class="specs">Cross-Border M&A, Commercial Litigation, Arbitration (BANI & SIAC)</p>
              <span class="email-link">dhoni@dmp-advocates.com</span>
            </div>
          </div>
          <div class="lawyer-card" data-rank="partner" onclick="switchTab('contact')">
            <div class="lawyer-photo-placeholder">
              <span style="font-size: 38px; color: var(--color-dblue);">👔</span>
              <span class="badge-rank">Partner</span>
            </div>
            <div class="lawyer-card-body">
              <h4>Ahmad Prasetyo, S.H., M.Kn.</h4>
              <span class="role">Partner</span>
              <p class="specs">Banking, Project Finance, Syndicated Facilities, Fintech OJK</p>
              <span class="email-link">ahmad@dmp-advocates.com</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ==================== 4. INSIGHTS VIEW ==================== -->
  <main id="view-insights" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Insights & Research</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Indonesian Legal & Regulatory Intelligence</h1>
        <p class="hero-desc">Authoritative legal alerts, legislative briefs, and strategic whitepapers from DM&P Advocates.</p>
      </div>
    </section>
  </main>

  <!-- ==================== 5. RANKINGS VIEW ==================== -->
  <main id="view-rankings" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Directory Accolades</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Global Recognition & Industry Rankings</h1>
        <p class="hero-desc">Independent directory evaluations and client testimonials honoring our partner leadership.</p>
      </div>
    </section>
  </main>

  <!-- ==================== 6. CONTACT VIEW ==================== -->
  <main id="view-contact" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Direct Intake</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Contact DM&P Advocates</h1>
        <p class="hero-desc">Schedule a confidential consultation with our partners at our SCBD headquarters.</p>
      </div>
    </section>
    <section class="contact-section">
      <div class="container">
        <div class="contact-grid">
          <div class="contact-info-box">
            <h3>Headquarters & Consultation Desk</h3>
            <p>Our partners are available for confidential consultations regarding corporate mandates, regulatory compliance, and dispute resolution.</p>
            <div class="hq-card">
              <h5>📍 Pacific Century Place SCBD</h5>
              <p>Level 17, Sudirman Central Business District (SCBD)<br>Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan 12190</p>
            </div>
            <div class="hq-card">
              <h5>📞 Direct Communication Channels</h5>
              <p><strong>Telephone:</strong> +62 21 5088 8899<br><strong>Email:</strong> counsel@dmp-advocates.com</p>
            </div>
          </div>
          <div class="form-box">
            <h4 style="font-size: 18px; font-weight: 700; color: var(--color-dblue); margin-bottom: 20px;">Confidential Consultation Inquiry</h4>
            <form onsubmit="handleFormSubmit(event)">
              <div class="form-group">
                <label>Full Name *</label>
                <input type="text" class="form-control" placeholder="e.g. John Doe" required>
              </div>
              <div class="form-group">
                <label>Company / Organization *</label>
                <input type="text" class="form-control" placeholder="e.g. PT Mandiri Megah International" required>
              </div>
              <div class="form-group">
                <label>Corporate Email *</label>
                <input type="email" class="form-control" placeholder="name@company.com" required>
              </div>
              <button type="submit" class="btn-cta" style="width: 100%; justify-content: center;">Submit Confidential Mandate Inquiry</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ==================== MAIN FOOTER ==================== -->
  <footer class="main-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col">
          <div class="logo-title" style="color: #ffffff; margin-bottom: 6px;">DM<span class="gold">&</span>P Advocates</div>
          <div class="logo-subtitle" style="color: rgba(255, 255, 255, 0.6); margin-bottom: 18px;">Dhoni Martien & Partners</div>
          <p>A premier Indonesian corporate and commercial law firm advising multinational enterprises and market leaders.</p>
        </div>
        <div class="footer-col">
          <h5>Core Practices</h5>
          <ul>
            <li><a href="javascript:void(0)" onclick="switchTab('practices')">Corporate & M&A</a></li>
            <li><a href="javascript:void(0)" onclick="switchTab('practices')">Commercial Litigation</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h5>Quick Links</h5>
          <ul>
            <li><a href="javascript:void(0)" onclick="switchTab('home')">Home</a></li>
            <li><a href="javascript:void(0)" onclick="switchTab('practices')">Practice Directory</a></li>
            <li><a href="javascript:void(0)" onclick="switchTab('lawyers')">Our Lawyers</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h5>SCBD Headquarters</h5>
          <p>Pacific Century Place Level 17<br>SCBD Kav. 52-53, Jakarta Selatan 12190<br><br><strong>Tel:</strong> +62 21 5088 8899</p>
        </div>
      </div>
      <div class="footer-bottom">
        <div>© 2026 <strong>DM&P Advocates (Dhoni Martien & Partners)</strong>. All rights reserved.</div>
        <div>Engineered & Crafted by <strong>Accelerate Lab (PT Akselerasi Digital Mandiri)</strong></div>
      </div>
    </div>
  </footer>

  <script>
    function switchTab(tabId) {
      document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active-view'));
      document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
      const targetView = document.getElementById('view-' + tabId);
      if (targetView) targetView.classList.add('active-view');
      const targetNav = document.getElementById('nav-' + tabId);
      if (targetNav) targetNav.classList.add('active');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function filterLawyers(rank, btn) {
      document.querySelectorAll('.filter-pill').forEach(el => el.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('.lawyer-card').forEach(card => {
        if (rank === 'all' || card.getAttribute('data-rank') === rank) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    function setLang(lang) {
      document.getElementById('btn-en').classList.toggle('active', lang === 'EN');
      document.getElementById('btn-id').classList.toggle('active', lang === 'ID');
    }

    function handleFormSubmit(e) {
      e.preventDefault();
      alert('Thank you. Your confidential inquiry has been routed to DM&P Advocates Partner Consultation Desk.');
    }
  </script>
</body>
</html>
HTML;

        Demo::updateOrCreate(
            ['slug' => 'dmp-advocates'],
            [
                'title' => 'DM&P Advocates — Corporate & Commercial Law Firm',
                'client_name' => 'Dhoni Martien & Partners',
                'industry' => 'Corporate & Commercial Law',
                'description' => 'Bespoke high-stakes corporate law firm prototype based on SSEK & Makarim Tier-1 standards.',
                'html_content' => $htmlContent,
                'access_passcode' => null,
                'default_device' => 'desktop',
                'is_active' => true,
            ]
        );
    }
}
