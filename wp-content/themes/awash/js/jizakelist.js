window.onload = function () {
    document.getElementById('accordion').onclick = function () {
        let element = document.getElementById('search_inner');
        element.classList.toggle('hide');
    };

    let windowWidth = window.innerWidth;
    let prodHight = document.querySelectorAll("div.jl_product");
    if (windowWidth >= 560 && prodHight.length > 1) {
        h = prodHight[0].clientHeight;
        prodHight[1].style.marginTop = h / 2 + 'px';
    }

    window.addEventListener('resize', function () {
        windowWidth = window.innerWidth;
        if (windowWidth >= 560 && prodHight.length > 1) {
            h = prodHight[0].clientHeight;
            prodHight[1].style.marginTop = h / 2 + 'px';
        } else {
            if (prodHight.length > 1) {
                prodHight[1].style.marginTop = 0 + 'px';
            }
        }
    });

    let slideConts = document.querySelectorAll('.slideConts');
    let slideContsRect = [];
    let slideContsTop = [];
    let windowY = window.pageYOffset;
    let windowH = window.innerHeight;
    let remainder = 100;
    for (let i = 0; i < slideConts.length; i++) {
        slideContsRect.push(slideConts[i].getBoundingClientRect());
    }
    for (let i = 0; i < slideContsRect.length; i++) {
        slideContsTop.push(slideContsRect[i].top + windowY);
    }
    window.addEventListener('resize', function () {
        windowH = window.innerHeight;
    });
    window.addEventListener('scroll', function () {
        windowY = window.pageYOffset;

        for (let i = 0; i < slideConts.length; i++) {
            if (windowY > slideContsTop[i] - windowH + remainder) {
                slideConts[i].classList.add('show');
            }
        }
    });
};
