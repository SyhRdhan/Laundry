// Micro-Interactions & Tooltips
document.addEventListener('DOMContentLoaded', function() {
    // Tooltip Dinamis
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-tooltip]'));
    tooltipTriggerList.map(function (triggerEl) {
        return new bootstrap.Tooltip(triggerEl, {
            trigger: 'hover focus',
            placement: 'top',
            delay: { show: 200, hide: 100 }
        });
    });

    // 3D Hover untuk Cards
    document.querySelectorAll('.neum-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.transform = `rotateY(${ (x / rect.width - 0.5) * 10 }deg) rotateX(${ (y / rect.height - 0.5) * -10 }deg)`;
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'rotateY(0deg) rotateX(0deg)';
        });
    });

    // Progress Bar Animation on Scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progress = entry.target.querySelector('.progress-bar');
                if (progress) {
                    progress.style.width = progress.getAttribute('style').match(/width: (\d+)%/)?.[1] || '0%';
                }
            }
        });
    });

    document.querySelectorAll('.progress').forEach(progress => observer.observe(progress));
});

// Chart dengan Interaktivitas Tinggi
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('analyticsChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [120000, 190000, 30000, 50000, 20000, 30000],
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.9)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        borderColor: 'rgba(59, 130, 246, 0.5)',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart'
                }
            }
        });
    }
});