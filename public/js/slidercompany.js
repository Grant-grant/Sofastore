let body = document.querySelector('body');

//slider functional

let sliderCounter = 0;
let sliderElemArr = document.querySelectorAll('.slider_elem');
let sliderRightArrow = document.querySelector('.slider .right_arrow');
let sliderLeftArrow = document.querySelector('.slider .left_arrow');
for (let i = 0; i < 6; i++) {
    sliderElemArr[i].style.left = 'calc(21vw * ' + i + ')';
}
let reducedR = false;
sliderRightArrow.addEventListener('click', function() {
    let remember;
    if (sliderElemArr[sliderCounter - 3]) {
        remember = sliderElemArr[sliderCounter - 3];
        reducedR = true;
    } else {
        remember = sliderElemArr[sliderCounter + 3];
    }
    if (reducedR) {
        remember.style.transition = 'left 0s linear';
        remember.style.left = '63vw';

    }
    setTimeout(function() {
        for (let i = 0; i < 6; i++) {
            remember.style.transition = 'left 0.6s linear';
            sliderElemArr[i].style.left = 'calc(' + sliderElemArr[i].style.left + ' - 21vw)';
        }
    }, 40);

    sliderCounter++;
    while (sliderCounter > 5) {
        sliderCounter -= 6;
    }
});
let reducedL = false;
sliderLeftArrow.addEventListener('click', function() {
    let remember;
    if (sliderElemArr[sliderCounter + 5]) {
        remember = sliderElemArr[sliderCounter + 5];
        reducedL = true;
    } else {
        remember = sliderElemArr[sliderCounter - 1];
    }
    if (reducedL || reducedR) {
        remember.style.transition = 'left 0s linear';
        remember.style.left = '-21vw';

    }
    setTimeout(function() {
        for (let i = 0; i < 6; i++) {
            remember.style.transition = 'left 0.6s linear';
            sliderElemArr[i].style.left = 'calc(' + sliderElemArr[i].style.left + ' + 21vw)';
        }
    }, 40);

    sliderCounter--;
    while (sliderCounter < 0) {
        sliderCounter += 6;
    }
})

//header sliding
let headerClickTrigger = false;
let headerSliderCounter = 0;
let headerSliderPics = document.querySelector('header');
let headerSliderLeftArrow = document.querySelector('.header_left_arrow');
let headerSliderRightArrow = document.querySelector('.header_right_arrow');
let headerSlideRight = function() {
    if (headerSliderCounter < 1) {
        headerSliderCounter++; 
        headerSliderPics.style.marginLeft = 'calc( -100vw * ' + headerSliderCounter + ')';
    } else
    if (headerSliderCounter == 1) {
        headerSliderCounter = 0;
        headerSliderPics.style.marginLeft = 'calc( -100vw * ' + headerSliderCounter + ')';
    };
    headerClickTrigger = true;
}
let headerSlideLeft = function() {
    if (headerSliderCounter > 0) {
        headerSliderCounter--;
        headerSliderPics.style.marginLeft = 'calc( -100vw * ' + headerSliderCounter + ')';
    } else
    if (headerSliderCounter == 0) {
        headerSliderCounter = 1;
        headerSliderPics.style.marginLeft = 'calc( -100vw * ' + headerSliderCounter + ')';
    }
    headerClickTrigger = true;
}
headerSliderLeftArrow.addEventListener('click', headerSlideLeft);
headerSliderRightArrow.addEventListener('click', headerSlideRight);
let headerAutoScroll = function() {
    setTimeout(function() {
        if (!headerClickTrigger) {
            headerSlideRight();
        } else {
            headerClickTrigger = false;
        }
        headerAutoScroll();
    }, 8000)
};
headerAutoScroll();

//галерея футера

let galleryFrame = document.querySelector('.gallery_frame');
let leftPics = document.querySelectorAll('.gallery_open');
let galleryCross = document.querySelector('.gallery_cross');
let galleryImg = document.querySelectorAll('.gallery_pic_wrapper img');
let galleryOpen = function() {
    galleryFrame.style.display = 'block';
};
let galleryClose = function() {
    galleryFrame.style.display = 'none';
};
leftPics[0].addEventListener('click', galleryOpen);
leftPics[1].addEventListener('click', galleryOpen);
galleryCross.addEventListener('click', galleryClose);
for (let i = 0; i < galleryImg.length; i++) {
    galleryImg[i].addEventListener('click', function() {
        let div = document.createElement('div');
        div.style.position = 'fixed';
        div.style.width = '100vw';
        div.style.height = '100vh';
        div.style.cursor = 'pointer';
        div.style.zIndex = '20';
        let img = document.createElement('img');
        galleryFrame.appendChild(div);
        div.appendChild(img);
        img.src = galleryImg[i].src;
        img.style.height = '90vh';
        img.style.position = 'absolute';
        img.style.top = '5vh';
        img.style.left = '50vw';
        img.style.transform = "translate(-50%)";
        img.style.border = '2px black solid';
        div.addEventListener('click', function() {
            galleryFrame.removeChild(div);
        });
    })
};



//плавные ссылки

$(function() {
    $('a[href^="#"]').click(function() {
        var target = $(this).attr('href');
        $('html, body').animate({ scrollTop: $(target).offset().top }, 800);
        return false;
    });
});

//форма заказа

let orderForm = document.querySelector('.order_form');
let nextButton = document.querySelector('.next_button');
let firstScreen = document.querySelector('.first_screen');
let secondScreen = document.querySelector('.second_screen');
let connectInput = document.querySelector('.connect_input');
let formCross = document.querySelector('.form_cross');
let menuOrder = document.querySelectorAll('.online_order');
let orderCreate = function() {
    orderForm.style.display = 'block';
    setTimeout(function() {
        orderForm.style.opacity = '1';
    }, 40);
};

let orderClose = function() {
    orderForm.style.opacity = '0';
    orderForm.style.display = 'none';
    firstScreen.style.left = '0';
    secondScreen.style.left = '60vh';
}
nextButton.addEventListener('click', function() {
    firstScreen.style.left = '-60vh';
    secondScreen.style.left = '0';
});
connectInput.addEventListener('click', function() {
    orderClose();
    setTimeout(function() { alert('Заказ №123456. Спасибо!') }, 500);
});
formCross.addEventListener('click', orderClose);
menuOrder[0].addEventListener('click', orderCreate);
menuOrder[1].addEventListener('click', orderCreate);