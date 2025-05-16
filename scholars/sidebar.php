<!-- Sidebar-->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
  /* Keep original sidebar structure */
  .tcolor {
    color: <?php echo $settings['text_color'] ?>;
  }

  /* Enhanced menu items with Tailwind */
  .menu-vertical {
    font-family: 'Poppins', sans-serif;
  }

  .menu-item {
    margin-bottom: 0.5rem;
    position: relative;
    transition: all 0.2s ease;
  }

  .menu-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.25rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .menu-link:hover {
    transform: translateX(5px);
    background-color: rgba(232, 212, 212, 0.16) !important;
    color: <?php echo $settings['text_color'] ?> !important;
  }
  
  /* Tailwind enhanced active state */
  .active {
    color: <?php echo $settings['text_color'] ?>;
    background-color: rgba(232, 212, 212, 0.16) !important;
    font-weight: 500;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  }
  
  /* Add subtle hover effect */
  .menu-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 0;
    background-color: rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
  }
  
  .menu-link:hover::before {
    width: 100%;
  }

  .menu-icon {
    font-size: 1.2rem;
    margin-right: 0.8rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    opacity: 0.9;
  }
  
  .menu-link:hover .menu-icon {
    transform: scale(1.1);
    opacity: 1;
  }

  .app-brand-text {
    font-weight: 600;
    letter-spacing: 0.5px;
  }

  .menu-inner {
    padding: 1.5rem 1rem;
  }

  /* Enhanced notification badge */
  .notification-badge {
    position: absolute;
    top: 50%;
    right: 25px;
    transform: translateY(-50%);
    background: #800000;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
    animation: pulse 2s infinite;
    z-index: 1;
    box-shadow: 0 2px 5px rgba(128, 0, 0, 0.3);
  }

  @keyframes pulse {
    0% {
      transform: translateY(-50%) scale(1);
      box-shadow: 0 0 0 0 rgba(128, 0, 0, 0.7);
    }

    70% {
      transform: translateY(-50%) scale(1.1);
      box-shadow: 0 0 0 10px rgba(128, 0, 0, 0);
    }

    100% {
      transform: translateY(-50%) scale(1);
      box-shadow: 0 0 0 0 rgba(128, 0, 0, 0);
    }
  }
  
  /* Menu category headers */
  .menu-header {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: <?php echo $settings['text_color'] ?>;
    opacity: 0.6;
    margin: 1.25rem 1.25rem 0.75rem;
  }
  
  /* Menu divider */
  .menu-divider {
    height: 1px;
    margin: 1rem 1.25rem;
    background-color: rgba(255, 255, 255, 0.1);
  }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu"
  style="background-color: <?php echo $settings['color'] ?>">
  <div class="app-brand demo">
    <a href="system_description.php" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="../assets/images/logo/<?php echo $settings['Logo'] ?>" alt="" class="img-fluid d-none d-sm-block"
          width="30px">
      </span>
      <span
        class="app-brand-text demo menu-text fw-bold ms-2 tcolor text-uppercase"><?php echo $settings['abbreviation'] ?></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <img src="../assets/images/logo/<?php echo $settings['Logo'] ?>" alt="" class="" width="40px">
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <?php if ($roles == 1) { ?>
      <!-- Admin Menu -->
      <div class="menu-header">Administration</div>
      
      <li class="menu-item <?php if ($a == 1) { echo "active"; } ?>">
        <a href="index.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon tf-icons fi fi-rr-dashboard-panel"></i>
          <div data-i18n="Basic">Dashboard</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 2) { echo "active"; } ?>">
        <a href="user.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Basic">Administrators</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 9) { echo "active"; } ?>">
        <a href="scholars.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Basic">Scholars</div>
        </a>
      </li>
      
      <div class="menu-divider"></div>
      <div class="menu-header">Content</div>
      
      <li class="menu-item <?php if ($a == 8) { echo "active"; } ?>">
        <a href="bulletin.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-megaphone-sound-waves"></i>
          <div data-i18n="Basic">Announcements</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 7) { echo "active"; } ?>">
        <a href="publications.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-blog-text"></i>
          <div data-i18n="Basic">Publications</div>
        </a>
      </li>
      
      <div class="menu-divider"></div>
      <div class="menu-header">Scholarship</div>
      
      <li class="menu-item <?php if ($a == 3) { echo "active"; } ?>">
        <a href="scholarships.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-diploma"></i>
          <div data-i18n="Basic">Scholarship Programs</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 4) { echo "active"; } ?>">
        <a href="semeters.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-calendar-day"></i>
          <div data-i18n="Basic">Semesters</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 5) { echo "active"; } ?>">
        <a href="settings.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-settings"></i>
          <div data-i18n="Basic">Settings</div>
        </a>
      </li>
      
      <?php if ($roles != 3): ?>
        <li class="menu-item">
          <a href="stipend_management.php" class="menu-link tcolor hover:shadow-sm">
            <i class="menu-icon tf-icons fas fa-money-bill-wave"></i>
            <div data-i18n="Analytics">Stipend Management</div>
          </a>
        </li>
      <?php endif; ?>
      
      <?php if ($roles == 1 || $roles == 2): ?>
        <li class="menu-item">
          <a href="test_notification.php" class="menu-link tcolor hover:shadow-sm">
            <i class="menu-icon tf-icons bx bx-envelope"></i>
            <div data-i18n="Test Notifications">Notifications</div>
          </a>
        </li>
      <?php endif; ?>

    <?php } elseif ($roles == 2) { ?>
      <!-- Staff Menu -->
      <div class="menu-header">Staff Portal</div>
      
      <li class="menu-item <?php if ($a == 1) { echo "active"; } ?>">
        <a href="index.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon tf-icons fi fi-rr-dashboard-panel"></i>
          <div data-i18n="Basic">Dashboard</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 6) { echo "active"; } ?>">
        <a href="applications.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-list-check"></i>
          <div data-i18n="Basic">Applications</div>
        </a>
      </li>
      
    <?php } else { ?>
      <!-- Scholar Menu -->
      <div class="menu-header">Scholar Portal</div>
      
      <li class="menu-item <?php if ($a == 1) { echo "active"; } ?>">
        <a href="index.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon tf-icons fi fi-rr-home"></i>
          <div data-i18n="Basic">Home</div>
        </a>
      </li>
      
      <li class="menu-item <?php if ($a == 3) { echo "active"; } ?>">
        <a href="scholarshipsuser.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-diploma"></i>
          <div data-i18n="Basic">Offered Scholarships</div>
        </a>
      </li>

      <?php
      $approved_count = $pdo->prepare("SELECT COUNT(*) as count FROM scholarship_applications WHERE userID = :userID AND application_status = 1");
      $approved_count->bindParam(':userID', $fetch_info['userID']);
      $approved_count->execute();
      $count = $approved_count->fetch();
      ?>

      <li class="menu-item <?php if ($a == 5) { echo "active"; } ?>">
        <a href="myscholarlist.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-list-check"></i>
          <div data-i18n="Basic">My Scholarships</div>
          <?php if ($count['count'] > 0): ?>
            <span class="notification-badge"><?php echo $count['count']; ?></span>
          <?php endif; ?>
        </a>
      </li>

      <li class="menu-item <?php if ($a == 10) { echo "active"; } ?>">
        <a href="bulletin_scholar.php" class="menu-link tcolor hover:shadow-sm">
          <i class="menu-icon fi fi-rr-megaphone"></i>
          <div data-i18n="Basic">Bulletin</div>
        </a>
      </li>

    <?php } ?>
  </ul>
</aside>

<script>
  // Add hover effects and animations
  document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
      const link = item.querySelector('.menu-link');
      const icon = item.querySelector('.menu-icon');
      
      // Add subtle hover animation
      link.addEventListener('mouseenter', function() {
        if (!item.classList.contains('active')) {
          icon.style.transform = 'scale(1.1)';
        }
      });
      
      link.addEventListener('mouseleave', function() {
        if (!item.classList.contains('active')) {
          icon.style.transform = 'scale(1)';
        }
      });
    });
  });
</script>
