<script src="resources/function.js"></script>
<script src="resources/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>   
<script type="text/javascript">
    $(document).ready(function(){
        $('.mobile-menu-bar').on('click', function(){
            var navigation = $('.navigation');
            // if(navigation.hasClass('block')){
            //     navigation.removeClass('block');
            // }else{
            //     navigation.addClass('block');
            // }

            // navigation.toggleClass('block');

            navigation.slideToggle();


            return false;
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const progressBar = document.getElementById('progress-bar');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    progressBar.style.width = '62%'; // Giá trị bạn muốn cập nhật
                    progressBar.setAttribute('aria-valuenow', 62);
                    observer.unobserve(progressBar); // Ngừng quan sát sau khi đã cập nhật
                }
            });
        }, {
            threshold: 0.5 // Tỉ lệ phần tử hiển thị trong viewport (50%)
        });

        observer.observe(progressBar);
    });
</script>
<!-- event scoll pprogress-ChuotNeChatGPT :V -->
<script>
    document.addEventListener('DOMContentLoaded', function () { //Sự kiện DOMContentLoaded được kích hoạt khi toàn bộ tài liệu HTML đã được tải và phân tích cú pháp
                                                                //Khi sự kiện này xảy ra, hàm callback sẽ được thực thi.
        const progressElements = document.querySelectorAll('.progress');  //Sử dụng document.querySelectorAll để lấy tất cả các phần tử có lớp progress trên trang.
                                                                            //progressElements là một NodeList chứa tất cả các phần tử progress tìm thấy.
 
        const observer = new IntersectionObserver((entries) => { //Tạo một Intersection Observer để quan sát các phần tử và xác định khi nào chúng xuất hiện trong viewport.
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const barElement = entry.target.querySelector('.bar'); //entry.target là phần tử progress đang được quan sát.querySelector để tìm phần tử con có lớp bar bên trong phần tử progress.
                    const spanElement = entry.target.querySelector('span:nth-of-type(2)'); //Tìm phần tử span thứ hai bên trong phần tử progress.
                    const barValue = barElement.getAttribute('data-bar'); //Lấy giá trị của thuộc tính data-bar từ phần tử bar.
                    barElement.style.width = barValue + '%'; //Cập nhật chiều rộng của thanh tiến trình (bar) với giá trị từ thuộc tính data-bar.
                    spanElement.textContent = barValue + '%'; //Cập nhật nội dung của span thứ hai với giá trị từ thuộc tính data-bar.
                    observer.unobserve(entry.target); // Ngừng quan sát phần tử progress sau khi đã cập nhật, tránh việc callback bị kích hoạt lại khi cuộn thêm.
                }
            });
        }, {
            threshold: 0.5 // Tỉ lệ phần tử hiển thị trong viewport (50%)
        });

        progressElements.forEach(progressElement => { //Sử dụng forEach để lặp qua từng phần tử progress.
            observer.observe(progressElement); //Bắt đầu quan sát mỗi phần tử progress bằng observer.observe.
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.count');
    const speed = 10000; // Tốc độ đếm

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counter = entry.target;
            const updateCount = () => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText;

            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
            };

            updateCount();
            observer.unobserve(counter); // Ngừng quan sát sau khi đã cập nhật
        }
        });
    }, {
        threshold: 0.5 // Tỉ lệ phần tử hiển thị trong viewport (50%)
    });

    counters.forEach(counter => {
        observer.observe(counter);
    });
    });
</script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    // const input = document.querySelector('.first-name', '.first-email');
    // const label = document.querySelector('label[for="name"]', 'label[for="email"]');

    // input.addEventListener('focus', function() {
    //     label.classList.add('active-content');
    // });

    // input.addEventListener('blur', function() {
    //     label.classList.remove('active-content');
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        const label = document.querySelector(`label[for="${input.id}"]`);

        if (label) { // Ensure there is a corresponding label
            input.addEventListener('focus', function() {
                label.classList.add('active-content');
            });

            input.addEventListener('blur', function() {
                label.classList.remove('active-content');
            });
        }
    });
});
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const events = [
            { image: '.image-office', iconBackside: '.icon-backside-office', art: '.art-office' },
            { image: '.image-shore', iconBackside: '.icon-backside-shore', art: '.art-shore' },
            { image: '.image-comfort', iconBackside: '.icon-backside-comfort', art: '.art-comfort', comfortOverlay: '.comfort-overlay' },
            { image: '.image-notebook', iconBackside: '.icon-backside-notebook', art: '.art-notebook' }
        ];

        const info = document.querySelector('.info-office');

        events.forEach(event => {
            const image = document.querySelector(event.image);
            const iconBackside = document.querySelector(event.iconBackside);
            const art = document.querySelector(event.art);

            if (image) {
                image.addEventListener('click', function() {
                    hideInfoShowArt(info, art);
                });
            }

            if (iconBackside) {
                iconBackside.addEventListener('click', function() {
                    showInfoHideArt(info, art);
                });
            }

            if (event.comfortOverlay) {
                const comfortOverlay = document.querySelector(event.comfortOverlay);
                if (comfortOverlay) {
                    comfortOverlay.addEventListener('click', function() {
                        showInfoHideOverlay(info, art);
                    });
                }
            }
        });

        function hideInfoShowArt(info, art) {
            info.classList.add('hidden');
            art.classList.remove('hidden');
        }

        function showInfoHideArt(info, art) {
            info.classList.remove('hidden');
            art.classList.add('hidden');
        }

        function showInfoHideOverlay(info, overlay) {
            info.classList.remove('hidden');
            overlay.classList.add('hidden');
        }
    });
</script> -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const events = [
            { image: '.image-office', iconBackside: '.icon-backside-office', art: '.art-office' },
            { image: '.image-shore', iconBackside: '.icon-backside-shore', art: '.art-shore' },
            { image: '.image-comfort', iconBackside: '.icon-backside-comfort', art: '.art-comfort', comfortOverlay: '.comfort-overlay', imageCloseComfort: '.image-close-comfort' },
            { image: '.image-notebook', iconBackside: '.icon-backside-notebook', art: '.art-notebook', notebookOverlay: '.notebook-overlay', imageCloseNotebook: '.image-close-notebook' }
        ];

        const info = document.querySelector('.info-office');

        events.forEach(event => {
            const image = document.querySelector(event.image);
            const iconBackside = document.querySelector(event.iconBackside);
            const art = document.querySelector(event.art);

            if (image) {
                image.addEventListener('click', function() {
                    if (event.image === '.image-comfort') {
                        art.classList.remove('hidden');
                    } else {
                        hideInfoShowArt(info, art);
                    }
                });
            }

            if (iconBackside) {
                iconBackside.addEventListener('click', function() {
                    showInfoHideArt(info, art);
                });
            }

            if (event.comfortOverlay) {
                const comfortOverlay = document.querySelector(event.comfortOverlay);
                if (comfortOverlay) {
                    comfortOverlay.addEventListener('click', function() {
                        if (art && event.image === '.image-comfort') {
                            art.classList.add('hidden');
                        }
                    });
                }
            }

            if (event.imageCloseComfort) {
                const imageCloseComfort = document.querySelector(event.imageCloseComfort);
                if (imageCloseComfort) {
                    imageCloseComfort.addEventListener('click', function() {
                        if (art && event.image === '.image-comfort') {
                            art.classList.add('hidden');
                        }
                    });
                }
            }

            if (event.notebookOverlay) {
                const notebookOverlay = document.querySelector(event.notebookOverlay);
                if (notebookOverlay) {
                    notebookOverlay.addEventListener('click', function() {
                        if (art && event.image === '.image-comfort') {
                            art.classList.add('hidden');
                        }
                    });
                }
            }

            if (event.imageCloseNotebook) {
                const imageCloseNotebook = document.querySelector(event.imageCloseNotebook);
                if (imageCloseNotebook) {
                    imageCloseNotebook.addEventListener('click', function() {
                        if (art && event.image === '.image-comfort') {
                            art.classList.add('hidden');
                        }
                    });
                }
            }
        });

        function hideInfoShowArt(info, art) {
            info.classList.add('hidden');
            art.classList.remove('hidden');
        }

        function showInfoHideArt(info, art) {
            info.classList.remove('hidden');
            art.classList.add('hidden');
        }

        function showInfoHideOverlay(info, art) {
            art.classList.add('hidden');
        }
    });
</script> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const events = [
            { image: '.image-office', iconBackside: '.icon-backside-office', art: '.art-office' },
            { image: '.image-shore', iconBackside: '.icon-backside-shore', art: '.art-shore' },
            { image: '.image-comfort', iconBackside: '.icon-backside-comfort', art: '.art-comfort', comfortOverlay: '.comfort-overlay', imageCloseComfort: '.image-close-comfort' },
            { image: '.image-notebook', iconBackside: '.icon-backside-notebook', art: '.art-notebook', notebookOverlay: '.notebook-overlay', imageCloseNotebook: '.image-close-notebook' }
        ];

        const info = document.querySelector('.info-office');

        events.forEach(event => {
            const image = document.querySelector(event.image);
            const iconBackside = document.querySelector(event.iconBackside);
            const art = document.querySelector(event.art);

            if (image) {
                image.addEventListener('click', function() {
                    if (event.image === '.image-comfort') {
                        art.classList.remove('hidden'); // Hiển thị art-comfort
                    } else if (event.image === '.image-notebook') {
                        art.classList.remove('hidden'); // Hiển thị art-notebook
                    } else {
                        hideInfoShowArt(info, art); // Ẩn info-office và hiển thị art
                    }
                });
            }

            if (iconBackside) {
                iconBackside.addEventListener('click', function() {
                    showInfoHideArt(info, art); // Hiển thị info-office và ẩn art
                });
            }

            if (event.comfortOverlay) {
                const comfortOverlay = document.querySelector(event.comfortOverlay);
                if (comfortOverlay) {
                    comfortOverlay.addEventListener('click', function() {
                        if (art && event.image === '.image-comfort') {
                            art.classList.add('hidden'); // Ẩn art-comfort
                        }
                    });
                }
            }

            if (event.imageCloseComfort) {
                const imageCloseComfort = document.querySelector(event.imageCloseComfort);
                if (imageCloseComfort) {
                    imageCloseComfort.addEventListener('click', function() {
                        if (art && event.image === '.image-comfort') {
                            art.classList.add('hidden'); // Ẩn art-comfort
                        }
                    });
                }
            }

            if (event.notebookOverlay) {
                const notebookOverlay = document.querySelector(event.notebookOverlay);
                if (notebookOverlay) {
                    notebookOverlay.addEventListener('click', function() {
                        if (art && event.image === '.image-notebook') {
                            art.classList.add('hidden'); // Ẩn art-notebook
                        }
                    });
                }
            }

            if (event.imageCloseNotebook) {
                const imageCloseNotebook = document.querySelector(event.imageCloseNotebook);
                if (imageCloseNotebook) {
                    imageCloseNotebook.addEventListener('click', function() {
                        if (art && event.image === '.image-notebook') {
                            art.classList.add('hidden'); // Ẩn art-notebook
                        }
                    });
                }
            }
        });

        function hideInfoShowArt(info, art) {
            info.classList.add('hidden'); // Ẩn info-office
            art.classList.remove('hidden'); // Hiển thị art
        }

        function showInfoHideArt(info, art) {
            info.classList.remove('hidden'); // Hiển thị info-office
            art.classList.add('hidden'); // Ẩn art
        }
    });
</script>
<!-- hiển thị số lượng slide -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#carouselComfort');
    const totalSlidesElem = document.getElementById('total-slides-comfort');
    const currentSlideElem = document.getElementById('current-slide-comfort');

    function updateSlideInfo() {
      const totalSlides = document.querySelectorAll('#carouselComfort .carousel-item').length;
      const currentIndex = Array.from(document.querySelectorAll('#carouselComfort .carousel-item')).findIndex(item => item.classList.contains('active'));
      const currentSlide = currentIndex + 1; // Carousel index starts at 0

      // Update the text content with the slash in between
      currentSlideElem.textContent = `${currentSlide} \\ ${totalSlides}`;
    }

    // Initialize slide info
    updateSlideInfo();

    // Update slide info on slide event
    carousel.addEventListener('slid.bs.carousel', updateSlideInfo);
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#carouselNotebook');
    const totalSlidesElem = document.getElementById('total-slides-notebook');
    const currentSlideElem = document.getElementById('current-slide-notebook');

    function updateSlideInfo() {
      const totalSlides = document.querySelectorAll('#carouselNotebook .carousel-item').length;
      const currentIndex = Array.from(document.querySelectorAll('#carouselNotebook .carousel-item')).findIndex(item => item.classList.contains('active'));
      const currentSlide = currentIndex + 1; // Carousel index starts at 0

      // Update the text content with the slash in between
      currentSlideElem.textContent = `${currentSlide} \\ ${totalSlides}`;
    }

    // Initialize slide info
    updateSlideInfo();

    // Update slide info on slide event
    carousel.addEventListener('slid.bs.carousel', updateSlideInfo);
  });
</script>