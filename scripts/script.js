    // Toggle mobile menu
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      
      // Change icon
      const icon = menuBtn.querySelector('i');
      if (mobileMenu.classList.contains('hidden')) {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      } else {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
      }
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', (event) => {
      const isClickInsideMenu = mobileMenu.contains(event.target);
      const isClickOnMenuBtn = menuBtn.contains(event.target);
      
      if (!isClickInsideMenu && !isClickOnMenuBtn && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        const icon = menuBtn.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      }
    });
    // Function to animate counter
    function animateCounter(elementId, start, end, duration) {
      const element = document.getElementById(elementId);
      const range = end - start;
      const increment = end > start ? 1 : -1;
      const stepTime = Math.abs(Math.floor(duration / range));
      let current = start;
      
      const timer = setInterval(() => {
        current += increment;
        element.textContent = current.toLocaleString();
        if (current == end) {
          clearInterval(timer);
        }
      }, stepTime);
    }

    // Periodically increment counters
    setInterval(() => {
      const activeUsers = parseInt(document.getElementById('active-users').textContent.replace(/,/g, ''));
      const itemsSold = parseInt(document.getElementById('items-sold').textContent.replace(/,/g, ''));
      const totalAuctions = parseInt(document.getElementById('total-auctions').textContent.replace(/,/g, ''));
      
      document.getElementById('active-users').textContent = (activeUsers + 1).toLocaleString();
      document.getElementById('items-sold').textContent = (itemsSold + 2).toLocaleString();
      document.getElementById('total-auctions').textContent = (totalAuctions + 1).toLocaleString();
    }, 10000);

    // Add hover effects for auction cards
    document.querySelectorAll('.auction-card').forEach(card => {
      card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-5px)';
        card.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.1)';
      });
      
      card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
        card.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
      });
    });

    // Add hover effects for category buttons
    document.querySelectorAll('.category-button').forEach(button => {
      button.addEventListener('mouseenter', () => {
        button.style.borderColor = '#4f46e5';
        button.style.color = '#4f46e5';
      });
      
      button.addEventListener('mouseleave', () => {
        button.style.borderColor = '#e5e7eb';
        button.style.color = '#374151';
      });
    });