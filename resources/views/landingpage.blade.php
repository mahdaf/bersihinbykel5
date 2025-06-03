<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bersih.in - Platform Aksi Lingkungan</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#810000',
                        dark: '#121a0f',
                        gray: '#545454',
                        light: '#fafafa',
                        green: '#ebf2e8'
                    }
                }
            }
        }
    </script>

    <style>
        /* Keyframe Animations */
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Animation Classes */
        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Enhanced button hover effects */
        .btn-hover-effect {
            position: relative;
            overflow: hidden;
        }

        .btn-hover-effect::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-hover-effect:hover::before {
            left: 100%;
        }

        /* Card shimmer effect */
        .card-shimmer {
            position: relative;
            overflow: hidden;
        }

        .card-shimmer::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s;
            z-index: 1;
        }

        .card-shimmer:hover::before {
            left: 100%;
        }

        /* Stagger animation for cards */
        .stagger-animation:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stagger-animation:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stagger-animation:nth-child(3) {
            animation-delay: 0.3s;
        }

        /* Loading states */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        /* Responsive animations */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #810000;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #660000;
        }
    </style>
</head>
<body class="bg-light animate-fade-in mb-20">
    @include('components.navbar2')

    <!-- Hero Section -->
    <section class="relative">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="relative rounded-2xl overflow-hidden h-[500px] bg-gradient-to-r from-black/60 to-black/40">
                <img src="https://images.unsplash.com/photo-1618477461853-cf6ed80faba5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=500&q=80" 
                     alt="People cleaning beach" 
                     class="absolute inset-0 w-full h-full object-cover -z-10">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-8 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 max-w-4xl">
                        Cara termudah untuk aksi lingkungan nyata.
                    </h1>
                    <p class="text-lg md:text-xl mb-8 max-w-2xl opacity-90">
                        Temukan dan ikuti aksi bersih-bersih di area kamu. Kontribusi mudah untuk lingkungan yang lebih lestari
                        dan komunitas yang lebih sehat.
                    </p>
                    <button class="bg-primary hover:bg-primary/90 text-white px-8 py-3 text-lg font-semibold rounded-md transition-all duration-300 hover:scale-110 hover:shadow-xl animate-pulse hover:animate-none btn-hover-effect">
                        Mulai Sekarang!
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Environmental Actions Section -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-dark mb-12 animate-fade-in hover:animate-bounce-subtle transition-all duration-300">
                Pilihan Aksi Lingkungan
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Action Card 1 -->
                <div class="overflow-hidden border border-gray-200 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-xl hover:-translate-y-2 cursor-pointer group card-shimmer stagger-animation animate-fade-in bg-white">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=200&q=80" 
                             alt="Beach cleaning action" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition-colors duration-300">
                            Aksi Bersih Taman
                        </h3>
                        <p class="text-gray leading-relaxed">
                            Ikuti aksi bersih taman Sabtu ini untuk lingkungan yang lebih asri.
                        </p>
                    </div>
                </div>

                <!-- Action Card 2 -->
                <div class="overflow-hidden border border-gray-200 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-xl hover:-translate-y-2 cursor-pointer group card-shimmer stagger-animation animate-fade-in bg-white">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1547036967-23d11aacaee0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=200&q=80" 
                             alt="River cleaning action" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition-colors duration-300">
                            Aksi Bersih Sungai
                        </h3>
                        <p class="text-gray leading-relaxed">
                            Bersihkan bantaran sungai dan lindungi sumber daya air kita bersama.
                        </p>
                    </div>
                </div>

                <!-- Action Card 3 -->
                <div class="overflow-hidden border border-gray-200 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-xl hover:-translate-y-2 cursor-pointer group card-shimmer stagger-animation animate-fade-in bg-white">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=200&q=80" 
                             alt="Forest cleaning action" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition-colors duration-300">
                            Aksi Bersih Hutan
                        </h3>
                        <p class="text-gray leading-relaxed">
                            Jaga kelestarian hutan kita melalui partisipasi aktif dalam aksi kebersihan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-dark text-center mb-12">Siap Membuat Perubahan?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="text-center transition-all duration-300 hover:scale-105 hover:shadow-lg hover:bg-light p-6 rounded-lg cursor-pointer group stagger-animation animate-fade-in">
                    <div class="w-16 h-16 bg-green rounded-full mx-auto mb-4 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:scale-110">
                        <div class="w-12 h-12 bg-gray rounded-full transition-all duration-300 group-hover:bg-primary"></div>
                    </div>
                    <h4 class="font-bold text-dark mb-1 group-hover:text-primary transition-colors duration-300">
                        Rina Puspita
                    </h4>
                    <p class="text-gray text-sm mb-4">Volunteer</p>
                    <p class="text-gray text-sm leading-relaxed">
                        "Bersih.in mempermudah saya menemukan aksi lingkungan yang relevan. Prosesnya cepat dan dampaknya langsung terasa."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="text-center transition-all duration-300 hover:scale-105 hover:shadow-lg hover:bg-light p-6 rounded-lg cursor-pointer group stagger-animation animate-fade-in">
                    <div class="w-16 h-16 bg-green rounded-full mx-auto mb-4 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:scale-110">
                        <div class="w-12 h-12 bg-gray rounded-full transition-all duration-300 group-hover:bg-primary"></div>
                    </div>
                    <h4 class="font-bold text-dark mb-1 group-hover:text-primary transition-colors duration-300">
                        Agus Salim
                    </h4>
                    <p class="text-gray text-sm mb-4">Volunteer</p>
                    <p class="text-gray text-sm leading-relaxed">
                        "Platform yang efektif untuk menyalurkan keinginan berkontribusi. Bersih.in membantu mengorganisir aksi jadi lebih terstruktur."
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="text-center transition-all duration-300 hover:scale-105 hover:shadow-lg hover:bg-light p-6 rounded-lg cursor-pointer group stagger-animation animate-fade-in">
                    <div class="w-16 h-16 bg-green rounded-full mx-auto mb-4 flex items-center justify-center transition-all duration-300 group-hover:bg-primary/10 group-hover:scale-110">
                        <div class="w-12 h-12 bg-gray rounded-full transition-all duration-300 group-hover:bg-primary"></div>
                    </div>
                    <h4 class="font-bold text-dark mb-1 group-hover:text-primary transition-colors duration-300">
                        Dewi Lestari
                    </h4>
                    <p class="text-gray text-sm mb-4">Volunteer</p>
                    <p class="text-gray text-sm leading-relaxed">
                        "Dengan Bersih.in, melakukan aksi lingkungan jadi lebih mudah. Sangat membantu untuk mencapai tujuan bersama."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 px-4 bg-light border-t border-gray-200">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-gray text-sm">@2024 Bersih.in. Hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px",
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("animate-fade-in")
                    }
                })
            }, observerOptions)

            // Observe all elements that should animate on scroll
            const animateElements = document.querySelectorAll(".stagger-animation")
            animateElements.forEach((el) => observer.observe(el))

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener("click", function (e) {
                    e.preventDefault()
                    const target = document.querySelector(this.getAttribute("href"))
                    if (target) {
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        })
                    }
                })
            })

            // Add loading state to buttons
            document.querySelectorAll('button').forEach((button) => {
                button.addEventListener("click", function () {
                    if (!this.classList.contains("loading")) {
                        this.classList.add("loading")
                        setTimeout(() => {
                            this.classList.remove("loading")
                        }, 2000)
                    }
                })
            })

            // Parallax effect for hero section
            window.addEventListener("scroll", () => {
                const scrolled = window.pageYOffset
                const parallax = document.querySelector(".hero-bg")
                if (parallax) {
                    const speed = scrolled * 0.5
                    parallax.style.transform = `translateY(${speed}px)`
                }
            })

            // Add click handlers for action cards
            document.querySelectorAll('.card-shimmer').forEach((card) => {
                card.addEventListener('click', function() {
                    const title = this.querySelector('h3').textContent
                    showNotification(`Tertarik dengan ${title}? Fitur ini akan segera hadir!`, 'success')
                })
            })

            // Add click handlers for testimonial cards
            document.querySelectorAll('.stagger-animation').forEach((testimonial) => {
                if (testimonial.querySelector('h4')) {
                    testimonial.addEventListener('click', function() {
                        const name = this.querySelector('h4').textContent
                        showNotification(`Terima kasih ${name} atas testimoninya!`, 'success')
                    })
                }
            })

            // Hero CTA button click handler
            document.querySelector('.btn-hover-effect').addEventListener('click', function() {
                showNotification('Selamat datang di Bersih.in! Mari mulai berkontribusi untuk lingkungan.', 'success')
            })
        })

        // Utility functions
        function showNotification(message, type = "success") {
            const notification = document.createElement("div")
            notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white z-50 animate-fade-in ${
                type === "success" ? "bg-green-500" : "bg-red-500"
            }`
            notification.textContent = message
            document.body.appendChild(notification)

            setTimeout(() => {
                notification.remove()
            }, 3000)
        }

        function toggleLoading(element, isLoading) {
            if (isLoading) {
                element.classList.add("loading")
                element.disabled = true
            } else {
                element.classList.remove("loading")
                element.disabled = false
            }
        }

        // Add some interactive features
        document.addEventListener('mousemove', (e) => {
            const cards = document.querySelectorAll('.card-shimmer')
            cards.forEach(card => {
                const rect = card.getBoundingClientRect()
                const x = e.clientX - rect.left
                const y = e.clientY - rect.top
                
                if (x >= 0 && x <= rect.width && y >= 0 && y <= rect.height) {
                    card.style.transform = `perspective(1000px) rotateX(${(y - rect.height / 2) / 10}deg) rotateY(${(x - rect.width / 2) / 10}deg) scale3d(1.05, 1.05, 1.05)`
                } else {
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)'
                }
            })
        })

        // Reset card transforms when mouse leaves
        document.addEventListener('mouseleave', () => {
            const cards = document.querySelectorAll('.card-shimmer')
            cards.forEach(card => {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)'
            })
        })
    </script>
</body>
</html>
