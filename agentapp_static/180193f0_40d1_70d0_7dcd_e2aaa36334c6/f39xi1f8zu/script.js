// ========================================
// PAGE LOADER
// ========================================
window.addEventListener('load', () => {
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 1500);
});

// ========================================
// NAVBAR SCROLL EFFECT
// ========================================
const header = document.getElementById('header');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
}, { passive: true });

// ========================================
// MOBILE MENU TOGGLE
// ========================================
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const navMenu = document.getElementById('navMenu');

if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');

        // Animate hamburger icon
        const spans = mobileMenuToggle.querySelectorAll('span');
        if (navMenu.classList.contains('active')) {
            spans[0].style.transform = 'rotate(45deg) translateY(10px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translateY(-10px)';
        } else {
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }
    });
}

// Close mobile menu when clicking on a link
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            const spans = mobileMenuToggle.querySelectorAll('span');
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }
    });
});

// ========================================
// ANIMATED PARTICLES IN HERO
// ========================================
const createParticles = () => {
    const particlesContainer = document.getElementById('particles');
    if (!particlesContainer) return;

    const particleCount = 50;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.style.position = 'absolute';
        particle.style.width = Math.random() * 3 + 1 + 'px';
        particle.style.height = particle.style.width;
        particle.style.background = 'rgba(212, 175, 55, ' + (Math.random() * 0.5 + 0.2) + ')';
        particle.style.borderRadius = '50%';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animation = `float-particle ${Math.random() * 10 + 10}s linear infinite`;
        particle.style.animationDelay = Math.random() * 5 + 's';

        particlesContainer.appendChild(particle);
    }

    // Add keyframes for particle animation
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes float-particle {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(${Math.random() * 100 - 50}px);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
};

// Initialize particles
createParticles();

// ========================================
// SMOOTH SCROLL REVEAL ANIMATIONS
// ========================================
const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

const revealOnScroll = () => {
    const windowHeight = window.innerHeight;
    const revealPoint = 150;

    revealElements.forEach(element => {
        const revealTop = element.getBoundingClientRect().top;

        if (revealTop < windowHeight - revealPoint) {
            element.classList.add('active');
        }
    });
};

// Initial check on page load
window.addEventListener('load', revealOnScroll);

// Check on scroll
window.addEventListener('scroll', revealOnScroll, { passive: true });

// ========================================
// ANIMATED COUNTER FOR STATISTICS
// ========================================
const counters = document.querySelectorAll('.stat-number span[data-target]');
let hasAnimated = false;

const animateCounters = () => {
    const statsSection = document.querySelector('.stats-section');
    if (!statsSection) return;

    const statsSectionTop = statsSection.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (statsSectionTop < windowHeight - 100 && !hasAnimated) {
        hasAnimated = true;

        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2500; // 2.5 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            updateCounter();
        });
    }
};

window.addEventListener('scroll', animateCounters, { passive: true });
window.addEventListener('load', animateCounters);

// ========================================
// VIDEO BACKGROUND OPTIMIZATION
// ========================================
const heroVideo = document.getElementById('heroVideo');

if (heroVideo) {
    // Pause video when not in viewport (performance optimization)
    const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                heroVideo.play().catch(e => console.log('Video play failed:', e));
            } else {
                heroVideo.pause();
            }
        });
    }, { threshold: 0.5 });

    videoObserver.observe(heroVideo);

    // Fallback for mobile devices
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        heroVideo.removeAttribute('autoplay');
        heroVideo.pause();
    }
}

// ========================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ========================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;

        e.preventDefault();
        const target = document.querySelector(href);

        if (target) {
            const headerHeight = header.offsetHeight;
            const targetPosition = target.offsetTop - headerHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// ========================================
// ACTIVE NAVIGATION LINK ON SCROLL
// ========================================
const sections = document.querySelectorAll('section[id]');

const highlightNavigation = () => {
    const scrollY = window.pageYOffset;

    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 200;
        const sectionId = section.getAttribute('id');
        const navLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);

        if (navLink && scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            navLinks.forEach(link => link.classList.remove('active-link'));
            navLink.classList.add('active-link');
        }
    });
};

window.addEventListener('scroll', highlightNavigation, { passive: true });

// ========================================
// BACK TO TOP BUTTON
// ========================================
const backToTop = document.getElementById('backToTop');

if (backToTop) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    }, { passive: true });

    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ========================================
// PARALLAX EFFECT FOR SECTIONS
// ========================================
const parallaxElements = document.querySelectorAll('.hero-ship-animation, .journey-ship-animation');

const handleParallax = () => {
    const scrolled = window.pageYOffset;

    parallaxElements.forEach(element => {
        const speed = element.dataset.speed || 0.5;
        const yPos = -(scrolled * speed);
        element.style.transform = `translateY(${yPos}px)`;
    });
};

window.addEventListener('scroll', handleParallax, { passive: true });

// ========================================
// LAZY LOADING IMAGES
// ========================================
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}

// ========================================
// TYPING EFFECT FOR HERO TITLE (Optional Enhancement)
// ========================================
const createTypingEffect = (element, text, speed = 100) => {
    let index = 0;
    element.textContent = '';

    const typeChar = () => {
        if (index < text.length) {
            element.textContent += text.charAt(index);
            index++;
            setTimeout(typeChar, speed);
        }
    };

    typeChar();
};

// ========================================
// CUSTOM CURSOR EFFECT (Optional Enhancement)
// ========================================
const createCursor = () => {
    const cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    cursor.style.cssText = `
        position: fixed;
        width: 20px;
        height: 20px;
        border: 2px solid var(--gold-accent);
        border-radius: 50%;
        pointer-events: none;
        transform: translate(-50%, -50%);
        transition: all 0.15s ease;
        z-index: 9999;
        opacity: 0;
    `;
    document.body.appendChild(cursor);

    document.addEventListener('mousemove', (e) => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
        cursor.style.opacity = '1';
    });

    document.addEventListener('mouseleave', () => {
        cursor.style.opacity = '0';
    });

    // Enlarge cursor on clickable elements
    const clickables = document.querySelectorAll('a, button, .service-card, .news-card');
    clickables.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.width = '40px';
            cursor.style.height = '40px';
            cursor.style.background = 'rgba(212, 175, 55, 0.2)';
        });

        el.addEventListener('mouseleave', () => {
            cursor.style.width = '20px';
            cursor.style.height = '20px';
            cursor.style.background = 'transparent';
        });
    });
};

// Initialize custom cursor only on desktop
if (window.innerWidth > 768) {
    createCursor();
}

// ========================================
// SCROLL PROGRESS INDICATOR
// ========================================
const createScrollProgress = () => {
    const progressBar = document.createElement('div');
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--gold-accent), #ffd700);
        z-index: 10001;
        transition: width 0.1s ease;
    `;
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    }, { passive: true });
};

createScrollProgress();

// ========================================
// ANIMATED SECTION LABELS
// ========================================
const animateSectionLabels = () => {
    const labels = document.querySelectorAll('.section-label');

    labels.forEach(label => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'label-bounce 0.6s ease-out';
                }
            });
        }, { threshold: 0.5 });

        observer.observe(label);
    });

    // Add keyframes
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes label-bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
    `;
    document.head.appendChild(style);
};

animateSectionLabels();

// ========================================
// TILT EFFECT FOR CARDS
// ========================================
const addTiltEffect = () => {
    const cards = document.querySelectorAll('.service-card, .news-card');

    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -5;
            const rotateY = ((x - centerX) / centerX) * 5;

            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-15px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
        });
    });
};

addTiltEffect();

// ========================================
// TIMELINE ANIMATION ON SCROLL
// ========================================
const animateTimeline = () => {
    const timelineItems = document.querySelectorAll('.timeline-item');

    timelineItems.forEach((item, index) => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, { threshold: 0.2 });

        observer.observe(item);
    });
};

animateTimeline();

// ========================================
// FLOATING ANIMATION FOR ABOUT CARDS
// ========================================
const floatingCards = document.querySelectorAll('.floating-card');

floatingCards.forEach((card, index) => {
    card.style.animationDelay = index * 1.5 + 's';
});

// ========================================
// PREVENT SCROLL JANK WITH RAF
// ========================================
let ticking = false;

const optimizedScrollHandler = () => {
    if (!ticking) {
        window.requestAnimationFrame(() => {
            revealOnScroll();
            highlightNavigation();
            animateCounters();
            handleParallax();
            ticking = false;
        });
        ticking = true;
    }
};

window.addEventListener('scroll', optimizedScrollHandler, { passive: true });

// ========================================
// KEYBOARD NAVIGATION ACCESSIBILITY
// ========================================
document.addEventListener('keydown', (e) => {
    // ESC key closes mobile menu
    if (e.key === 'Escape' && navMenu.classList.contains('active')) {
        navMenu.classList.remove('active');
        const spans = mobileMenuToggle.querySelectorAll('span');
        spans[0].style.transform = 'none';
        spans[1].style.opacity = '1';
        spans[2].style.transform = 'none';
    }

    // Home key scrolls to top
    if (e.key === 'Home') {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // End key scrolls to bottom
    if (e.key === 'End') {
        e.preventDefault();
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }
});

// ========================================
// PRELOAD CRITICAL RESOURCES
// ========================================
const preloadResources = () => {
    // Preload hero video
    if (heroVideo) {
        const videoLink = document.createElement('link');
        videoLink.rel = 'preload';
        videoLink.as = 'video';
        const source = heroVideo.querySelector('source');
        if (source) {
            videoLink.href = source.src;
            document.head.appendChild(videoLink);
        }
    }

    // Preload critical images
    const criticalImages = document.querySelectorAll('.about-image img, .news-image img');
    criticalImages.forEach((img, index) => {
        if (index < 3) { // Preload first 3 images
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = img.src;
            document.head.appendChild(link);
        }
    });
};

// Call preload function
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', preloadResources);
} else {
    preloadResources();
}

// ========================================
// FORM VALIDATION (If contact form is added)
// ========================================
const contactForm = document.querySelector('.contact-form');

if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // Add your form submission logic here
        const formData = new FormData(contactForm);

        console.log('Form submitted with data:', Object.fromEntries(formData));

        // Show success message
        const successMsg = document.createElement('div');
        successMsg.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: var(--gold-accent);
            color: var(--navy-blue);
            padding: 20px 30px;
            border-radius: 10px;
            font-weight: 700;
            z-index: 10000;
            animation: slideIn 0.5s ease-out;
        `;
        successMsg.textContent = 'Thank you for contacting Sachdeva Group! We will get back to you soon.';
        document.body.appendChild(successMsg);

        setTimeout(() => {
            successMsg.style.animation = 'slideOut 0.5s ease-out';
            setTimeout(() => successMsg.remove(), 500);
        }, 3000);

        contactForm.reset();
    });
}

// ========================================
// EASTER EGG: KONAMI CODE
// ========================================
const konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
let konamiIndex = 0;

document.addEventListener('keydown', (e) => {
    if (e.key === konamiCode[konamiIndex]) {
        konamiIndex++;
        if (konamiIndex === konamiCode.length) {
            // Easter egg activated!
            document.body.style.animation = 'rainbow 3s infinite';
            const style = document.createElement('style');
            style.innerHTML = `
                @keyframes rainbow {
                    0% { filter: hue-rotate(0deg); }
                    100% { filter: hue-rotate(360deg); }
                }
            `;
            document.head.appendChild(style);

            setTimeout(() => {
                document.body.style.animation = '';
            }, 3000);

            konamiIndex = 0;
        }
    } else {
        konamiIndex = 0;
    }
});

// ========================================
// PERFORMANCE MONITORING
// ========================================
if ('PerformanceObserver' in window) {
    const observer = new PerformanceObserver((list) => {
        for (const entry of list.getEntries()) {
            // Log performance metrics
            if (entry.duration > 100) {
                console.warn('Long task detected:', entry);
            }
        }
    });

    observer.observe({ entryTypes: ['longtask'] });
}

// ========================================
// INITIALIZE ALL FEATURES
// ========================================
const init = () => {
    console.log('%c🚢 Sachdeva Group Website Initialized Successfully', 'color: #d4af37; font-size: 16px; font-weight: bold;');
    console.log('%cShip Recycling Excellence Since 1983', 'color: #0a2540; font-size: 12px;');

    // Log page load time
    if (window.performance) {
        const loadTime = window.performance.timing.domContentLoadedEventEnd - window.performance.timing.navigationStart;
        console.log(`Page loaded in ${loadTime}ms`);
    }
};

// Run initialization
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}

// ========================================
// SERVICE WORKER REGISTRATION (Optional - For PWA)
// ========================================
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        // Uncomment to enable service worker
        // navigator.serviceWorker.register('/sw.js')
        //     .then(reg => console.log('Service Worker registered'))
        //     .catch(err => console.log('Service Worker registration failed'));
    });
}