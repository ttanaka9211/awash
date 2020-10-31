
window.onload = function () {
    document.getElementById("accordion").onclick = function () {
        let element = document.getElementById('search_inner');
        element.classList.toggle("hide");
    };

    let windowWidth = window.innerWidth;
    let makerHight = document.querySelectorAll("div.kl_maker");
    if (windowWidth >= 560 && makerHight.length > 1) {
        h = makerHight[0].clientHeight;
        makerHight[1].style.marginTop = h / 2 + 'px';
    }

    window.addEventListener('resize', function () {
        windowWidth = window.innerWidth;
        if (windowWidth >= 560 && makerHight.length > 1) {
            h = makerHight[0].clientHeight;
            makerHight[1].style.marginTop = h / 2 + 'px';
        } else {
            if (makerHight.length > 1) {
                makerHight[1].style.marginTop = 0 + 'px';
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
