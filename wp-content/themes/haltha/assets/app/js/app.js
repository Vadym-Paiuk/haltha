document.addEventListener('DOMContentLoaded', () => {
    mobMenuToggle()
    toggleJoinItems()
    stickyHeader()
    valuesSlider()
    teamSlider()
    toggleFaqItems('.faqs__item-question')
    toggleFaqItems('.faq__item-question')
    toggleFaqCategories('.faq__category', '.faq__item')
    formValidation()
    loginForm()
    lostPasswordForm()
    resetPasswordForm()
    registrationForm()
    deleteAccount()
    switchFormSteps()
    toggleContent('.account-content', '.account-content__edit-btn')
    toggleContent('.account-content', '.account-content__close-btn')
    toggleContent('.account-sidebar', '.account-sidebar-toggle')
    let wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
    }).init()
    smoothScroll()
    telInputFlag()
    checkScrolledConsent(unlockConsentFields)
    editHealthInformationForm()

    Fancybox.bind('[data-fancybox]')
})

function toggleJoinItems() {
    let itemsLinks = document.querySelectorAll('.join__item-btn')
    let activeItem = document.querySelector('.join__item.active')
    if (!itemsLinks.length) return
    for (let i = 0; i < itemsLinks.length; i++) {
        itemsLinks[i].addEventListener('click', function (e) {
            e.preventDefault();
            if (e.currentTarget.parentElement === activeItem) {
                location.href = e.currentTarget.href
            } else {
                activeItem.classList.remove('active')
                activeItem = e.currentTarget.parentElement
                activeItem.classList.add('active')
            }
        })
    }
}

function toggleFaqItems(faqItemsQuestion) {
    let questions = document.querySelectorAll(faqItemsQuestion)
    if (!questions.length) return
    let activeQuestion = false

    for (let i = 0; i < questions.length; i++) {
        questions[i].addEventListener('click', function (e) {
            if (activeQuestion) {
                activeQuestion.classList.remove('active')
            }

            if (activeQuestion == e.currentTarget.parentElement) {
                activeQuestion = false
                return
            }

            activeQuestion = e.currentTarget.parentElement
            activeQuestion.classList.add('active')
        })
    }

}

function autoScrollFaqCategories(activeElement) {
    if (document.documentElement.clientWidth > 991) {
        return
    }

    const menu = document.querySelector(".faq__categories-inner")
    const menuWrapper = document.querySelector(".faq__categories")
    const menuWidth = menu.getBoundingClientRect().width
    const menuOffsetLeft = menu.getBoundingClientRect().left
    const menuWrapperOffsetLeft = menuWrapper.getBoundingClientRect().left
    const nextActiveElement = activeElement.nextElementSibling
    const previousActiveElement = activeElement.previousElementSibling

    if (nextActiveElement) {
        const nextActiveElementOffsetRight = nextActiveElement.getBoundingClientRect().right - menuOffsetLeft
        if (nextActiveElementOffsetRight > menuWidth) {
            const menuOffset = menuWidth - nextActiveElementOffsetRight
            menu.style.transform = `translateX(${menuOffset}px)`;
        }
    }
    if (previousActiveElement) {
        const previousActiveElementOffsetLeft = previousActiveElement.getBoundingClientRect().left - menuOffsetLeft;
        if ((previousActiveElementOffsetLeft - menuWrapperOffsetLeft) < 0) {
            const menuOffset = Math.min(-previousActiveElementOffsetLeft, 0);
            menu.style.transform = `translateX(${menuOffset}px)`;
        }
    }
}

function toggleFaqCategories(faqCategories, faqItems) {
    let categories = document.querySelectorAll(faqCategories)
    if (!categories.length) return
    let items = document.querySelectorAll(faqItems)
    let activeCategory = categories[0]
    activeCategory.classList.add('active')
    for (let k = 0; k < categories.length; k++) {
        categories[k].addEventListener('click', function (e) {
            if (activeCategory) {
                activeCategory.classList.remove('active')
            }
            activeCategory = e.currentTarget
            activeCategory.classList.add('active')
            filterItems(items, activeCategory)
            autoScrollFaqCategories(activeCategory)
        })
    }

    function filterItems(filteringItems, flteringActiveCategory) {
        for (let c = 0; c < filteringItems.length; c++) {
            if (flteringActiveCategory.dataset.category === filteringItems[c].dataset.category) {
                filteringItems[c].style.display = ''
            } else if (flteringActiveCategory.dataset.category === 'all') {
                filteringItems[c].style.display = ''
            } else {
                filteringItems[c].style.display = 'none'
            }

        }
    }
}

function mobMenuToggle() {
    let btn = document.querySelector('.header__navigation-btn-menu')
    let menu = document.querySelector('.header__navigation')
    let header = document.querySelector('.header')

    if (!menu) return;

    btn.addEventListener('click', function (e) {
        btn.classList.toggle('active')
        menu.classList.toggle('active')
        header.classList.toggle('active')
    })
}

function stickyHeader() {
    let header = document.querySelector('.header')

    if (!header) return;

    if (document.body.getBoundingClientRect().top < 0) {
        header.classList.add('sticky')
    } else {
        header.classList.remove('sticky')
    }

    document.addEventListener('scroll', function () {
        if (document.body.getBoundingClientRect().top < 0) {
            header.classList.add('sticky')
        } else {
            header.classList.remove('sticky')
        }

    })
}

function valuesSlider() {
    let swiper = new Swiper(".values-slider", {
        slidesPerView: 1,
        spaceBetween: 40,
        navigation: {
            nextEl: ".values-button-next",
            prevEl: ".values-button-prev",
        },
        pagination: {
            el: ".values-pagination",
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 1,
            renderBullet: function (index, className) {
                let preValue = ''
                if (index < 9) {
                    preValue = '0'
                } else {
                    preValue = ''
                }

                return '<div class="' + className + '">' + preValue + (index + 1) + "</div>";
            },
        },
    });
}

function teamSlider() {
    let swiper = new Swiper(".team-slider", {
        slidesPerView: 1,
        spaceBetween: 32,
        navigation: {
            nextEl: ".team-button-next",
            prevEl: ".team-button-prev",
        }
    });
}

function switchFormSteps() {
    let formSteps = document.querySelectorAll('.form__step')
    if (!formSteps.length) return
    let activeFormStep = document.querySelector('.form__step.active')
    if (activeFormStep !== null) {
        changeProgressbar(+activeFormStep.dataset.step)
    }
    for (let i = 0; i < formSteps.length; i++) {
        let btnNextStep = formSteps[i].querySelector('.btn-next'),
            btnPrevStep = formSteps[i].querySelector('.btn-prev')

        if (btnNextStep && btnNextStep.type === 'button') {
            btnNextStep.addEventListener('click', function () {
                let formStepInputs = formSteps[i].querySelectorAll('input[required]')
                for (let k = 0; k < formStepInputs.length; k++) {
                    validateInput(formStepInputs[k])
                }
                checkFormStepError(formSteps[i], nextFormStep)
            })
        }

        if (btnPrevStep && btnPrevStep.type === 'button') {
            btnPrevStep.addEventListener('click', prevFormStep)
        }
    }
}

function checkFormStepError(currentFormStep, nextFormStepCallback) {
    let hasErrors = currentFormStep.querySelector('.error')
    if (!hasErrors) {
        nextFormStepCallback()
    }
}

function nextFormStep() {
    let activeFormStep = document.querySelector('.form__step.active')
    if (activeFormStep.classList.contains('form__step-otp-phonenumber')) {
        send_verification_code()
    }

    if (activeFormStep.classList.contains('check-email-exist')) {
        check_email_exists(activeFormStep)
        return
    }

    activeFormStep.classList.remove('active')
    activeFormStep.nextElementSibling.classList.add('active')

    changeProgressbar(+activeFormStep.nextElementSibling.dataset.step)
}

function prevFormStep() {
    let activeFormStep = document.querySelector('.form__step.active')

    activeFormStep.classList.remove('active')
    activeFormStep.previousElementSibling.classList.add('active')

    changeProgressbar(activeFormStep.previousElementSibling.dataset.step)
}

function changeProgressbar(currentStep) {
    let bars = document.querySelectorAll('.form__progress')

    if (bars.length === 0) {
        return
    }

    setTimeout(function () {
        bars[currentStep - 1].children[0].style.width = `${((currentStep - 1) / (bars.length)) * 100}%`
    }, 100)
}

function formValidation(callbackSubmitFunc) {
    let form = document.querySelector('.js-form-validation')
    if (!form) return
    form.addEventListener('keyup', function (e) {
        validateInput(e.target)
    })

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        let formInputs = e.currentTarget.querySelectorAll('input[required]')
        for (let k = 0; k < formInputs.length; k++) {
            validateInput(formInputs[k])
        }
        checkFormStepError(e.target, function () {
            e.target.submit()
            console.log('form success submit')
        })
    })

}

function validateInput(input) {
    const regexPatterns = {
        firstname: /^[а-яА-Яa-zA-Z\s]+$/,
        lastname: /^[а-яА-Яa-zA-Z\s]+$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        state: /^[а-яА-Яa-zA-Z\s]+$/,
        city: /^[а-яА-Яa-zA-Z\s]+$/,
        phonenumber: /^\+?[0-9]+$/,
        zipcode: /^[0-9]{5}$/,
        birthday: /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/,
        todaydate: /^[0-9]{2}\.[0-9]{2}\.[0-9]{4}$/,
        password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d\W_]{8,}$/
    };

    let currentInput = input.form[input.name]

    if (!input.hasAttribute('required')) {
        setInputValidationResult(currentInput, true)
        return
    }

    let validateResult = false
    if (currentInput.length) {
        validateResult = [...currentInput].find(checkbox => {
            return checkbox.checked
        })
    } else if (currentInput.type === "checkbox" || currentInput.type === "radio") {
        validateResult = currentInput.checked
    } else if (currentInput.type === "date") {
        validateResult = regexPatterns[currentInput.name]

        if (validateResult && currentInput.name === 'birthday') {
            validateResult = underAgeValidate(currentInput.value)
        }
    } else if (currentInput.name === "consent_firstname") {
        let login_firstname = document.querySelector('[name=firstname]')
        validateResult = currentInput.value === login_firstname.value
    } else if (currentInput.name === "consent_lastname") {
        let login_firstname = document.querySelector('[name=lastname]')
        validateResult = currentInput.value === login_firstname.value
    } else if (currentInput.name === "otp_phonenumber") {
        let phone = $('[name=otp_phonenumber]')
        validateResult = phone.intlTelInput('isValidNumber')
    } else if (regexPatterns[currentInput.name]) {
        validateResult = regexPatterns[currentInput.name].test(currentInput.value);
    } else {
        validateResult = !!currentInput.value.length
    }

    setInputValidationResult(currentInput, validateResult)
    unlockConsentAgree(currentInput, validateResult)
    return validateResult;
}

function underAgeValidate(birthday) {
    let optimizedBirthday = birthday.replace(/-/g, "/")

    let Birthday = new Date(optimizedBirthday)

    let Age = ~~((Date.now() - Birthday) / (31557600000))

    return Age >= 18
}

function setInputValidationResult(input, result) {
    if (result) {
        if (input.length) {
            input[0].parentElement.parentElement.classList.remove('error')
        } else if (input.type === "checkbox" || input.type === "radio") {
            input.parentElement.parentElement.classList.remove('error')
        } else {
            input.classList.remove('error')
        }
    } else {
        if (input.length) {
            input[0].parentElement.parentElement.classList.add('error')
        } else if (input.type === "checkbox" || input.type === "radio") {
            input.parentElement.parentElement.classList.add('error')
        } else {
            input.classList.add('error')
        }
    }
}

function toggleContent(block, target) {
    let container = document.querySelector(block)

    let btn = document.querySelector(target)
    if (!container || !btn) return

    btn.addEventListener('click', function (e) {
        e.currentTarget.classList.toggle('active')
        container.classList.toggle('active')
    })
}

function smoothScroll() {
    let linkNav = document.querySelectorAll('[href^="#"]')
    let header = document.querySelector('.header')

    if (!header) return;

    let headerHeight = header.getBoundingClientRect().height
    let V = 0.2;

    for (let i = 0; i < linkNav.length; i++) {
        linkNav[i].addEventListener('click', function (e) { //по клику на ссылку
            e.preventDefault(); //отменяем стандартное поведение
            let w = window.pageYOffset // производим прокрутка прокрутка
            let hash = this.href.replace(/[^#]*(.*)/, '$1');
            let tar = document.querySelector(hash) // к id элемента, к которому нужно перейти
            let t = tar.getBoundingClientRect().top - headerHeight
            let start = null;

            requestAnimationFrame(step); // подробнее про функцию анимации [developer.mozilla.org]
            function step(time) {
                if (start === null) {
                    start = time;
                }
                var progress = time - start,
                    r = (t < 0 ? Math.max(w - progress / V, w + t) : Math.min(w + progress / V, w + t));
                window.scrollTo(0, r);
                if (r != w + t) {
                    requestAnimationFrame(step)
                } else {
                    location.hash = hash // URL с хэшем
                }
            }

            if (t > 1 || t < -1) {
                requestAnimationFrame(step)
            }
        });
    }
}

let $ = jQuery.noConflict()

$(document).on('change', '#agree-privacy', function (e) {
    e.preventDefault()
    let form = $(this).parents('form'),
        submit = form.find('button')

    if ($(this).is(':checked')) {
        submit.attr('disabled', false)
    } else {
        submit.attr('disabled', true)
    }
})

function loginForm() {
    let form = document.querySelector('.js-form-authorization')

    if (!form) return

    form.addEventListener('keyup', function (e) {
        validateInput(e.target)
    })

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        let formInputs = e.currentTarget.querySelectorAll('input[required]')
        for (let k = 0; k < formInputs.length; k++) {
            validateInput(formInputs[k])
        }

        checkFormStepError(e.target, submitLoginForm)
    })
}

function submitLoginForm() {
    let form = $('.js-form-authorization')

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                window.location.href = response.data
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

function lostPasswordForm() {
    let form = document.querySelector('.js-form-lost-password')

    if (!form) return

    form.addEventListener('keyup', function (e) {
        validateInput(e.target)
    })

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        let formInputs = e.currentTarget.querySelectorAll('input[required]')
        for (let k = 0; k < formInputs.length; k++) {
            validateInput(formInputs[k])
        }

        checkFormStepError(e.target, submitLostPasswordForm)
    })
}

function submitLostPasswordForm() {
    let form = $('.js-form-lost-password')

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                noticeMessage(response.data)
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

function resetPasswordForm() {
    let form = document.querySelector('.js-form-reset-password')

    if (!form) return

    form.addEventListener('keyup', function (e) {
        validateInput(e.target)
    })

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        let formInputs = e.currentTarget.querySelectorAll('input[required]')
        for (let k = 0; k < formInputs.length; k++) {
            validateInput(formInputs[k])
        }

        checkFormStepError(e.target, submitResetPasswordForm)
    })
}

function submitResetPasswordForm() {
    let form = $('.js-form-reset-password')

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                window.location.href = response.data
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

function registrationForm() {
    let form = document.querySelector('.js-form-registration')

    if (!form) return

    form.addEventListener('keyup', function (e) {
        validateInput(e.target)

        if (e.target.name === 'zipcode' && validateInput(e.target)) {
            getStateCity(e.target.value, setStateCity)
        }
    })

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        let formInputs = e.currentTarget.querySelectorAll('input[required]')
        for (let k = 0; k < formInputs.length; k++) {
            validateInput(formInputs[k])
        }

        checkFormStepError(e.target, submitRegistrationForm)
    })
}

function submitRegistrationForm() {
    let form = $('.js-form-registration')

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                window.location.href = response.data
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

function deleteAccount() {
    let form = document.querySelector('.js-delete-account'),
        $form = $('.js-delete-account')

    if (!form) return

    form.addEventListener('submit', function (e) {
        e.preventDefault()

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: $form.serializeArray(),
            success: function (response) {
                if (response.success === true) {
                    window.location.href = response.data
                } else {
                    errorMessage(response.data)
                }
            },
            error: function () {
                console.log('Error')
            }
        })
    })
}

function telInputFlag() {
    const telInputs = $('.input-tel');

    telInputs.each(function (index) {
        $(this).intlTelInput({
            utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js',
            initialCountry: 'auto',
            geoIpLookup: function (callback) {
                fetch("https://ipapi.co/json")
                    .then(function (res) {
                        return res.json();
                    })
                    .then(function (data) {
                        callback(data.country_code);
                    })
                    .catch(function () {
                        callback("us");
                    });
            },
            preferredCountries: ['us', 'ca', 'gb'],
            separateDialCode: true,
            autoPlaceholder: 'off'
        });

        $(this).on('input', function () {
            let input = $(this),
                name = input.attr('name'),
                name_hidden = name + '_hidden',
                value = input.val(),
                dialCode = input.intlTelInput('getSelectedCountryData').dialCode

            value = value.replace('+' + dialCode, '')
            input.val(value)

            if ($('input[name=' + name_hidden + ']').length === 0) {
                return
            }

            $('input[name=' + name_hidden + ']').val(input.intlTelInput('getNumber'))
        })
    });
}

function send_verification_code() {
    let data = {
        action: 'send_verification_code',
        otp_phonenumber: $('input[name=otp_phonenumber]').intlTelInput('getNumber')
    }

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: data,
        success: function (response) {
            if (response.success === true) {
                //console.log(response.data)
            } else {
                console.log(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

function check_email_exists(activeFormStep) {
    let data = {
        action: 'check_email_exists',
        email: $('input[name=email]').val()
    }

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: data,
        success: function (response) {
            if (response.success === true) {
                activeFormStep.classList.remove('active')
                activeFormStep.nextElementSibling.classList.add('active')

                changeProgressbar(+activeFormStep.nextElementSibling.dataset.step)
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

$(document).on('click', '.select', function (e) {
    e.preventDefault()

    if ($(e.target).hasClass('option')) return

    $(this).toggleClass('open')
})

$(document).on('click', function (e) {
    let clickedElement = e.target

    if ($(clickedElement).closest('.hint').length === 0) {
        if ($(e.target).hasClass('option')) return

        $('.hint').removeClass('open')
    }
})

$(document).on('click', '.option', function (e) {
    e.preventDefault()

    let option = $(this),
        select = option.parents('.select, .hint'),
        input = select.find('.selected input'),
        title = select.find('span')

    $('.option').removeClass('current')
    option.toggleClass('current')

    if (option.data('option')) {
        if (input) {
            input.val(option.data('option'))
        }

        if (title && !title.hasClass('error-message')) {
            title.text($(this).text())
        }
    }

    select.toggleClass('open')

    if ($('.js-reload-posts').length) {
        $('.js-reload-posts').submit()
    }
})

$(document).on('submit', '.js-reload-posts', function (e) {
    e.preventDefault()
    let form = $(this)

    showLoader(form)

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                form.html(response.data)
            } else {
                console.log(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })

    $([document.documentElement, document.body]).animate({
        scrollTop: form.offset().top - 100
    }, 1000);
})

$(document).on('click', '.pagination-link', function (e) {
    e.preventDefault()

    $('[name=page]').val($(this).data('page'))
    $('[name=pagination]').val('true')
    $('.js-reload-posts').submit()
})

$(document).on('submit', '.js-form-subscribe', function (e) {
    e.preventDefault()

    let form = $(this)

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                noticeMessage(response.data)
                form[0].reset()
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
})

function showLoader(element) {
    element.prepend('<div class="loader-overlay"><div class="loader-cv-spinner"><span class="loader-spinner"></span></div></div>')
}

function noticeMessage(message) {
    $.growl({
        title: "",
        message: message,
        style: "notice"
    })
}

function errorMessage(message) {
    $.growl({
        title: "",
        message: message,
        style: "error",
        duration: 10000
    })
}

function getStateCity(zip, cb) {
    const url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + zip + '&sensor=true&key=' + args_object.geocoding_api_key;
    let stateCity = {}

    fetch(url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            let address_components = data.results[0].address_components

            for (let i = 0; i < address_components.length; i++) {
                let types = address_components[i].types

                for (let j = 0; j < types.length; j++) {
                    if (types[j] === 'administrative_area_level_1') {
                        stateCity.state = address_components[i].long_name
                    }
                    if (types[j] === 'locality') {
                        stateCity.city = address_components[i].long_name
                    }
                }
            }

            cb(stateCity)
        });
}

function setStateCity(data) {
    let state = document.querySelectorAll('[name=state]'),
        city = document.querySelectorAll('[name=city]')

    for (let i = 0; i < state.length; i++) {
        state[i].value = data['state']
    }

    for (let i = 0; i < city.length; i++) {
        city[i].value = data['city']
    }
}

function checkScrolledConsent(callback) {
    const consent = document.querySelector('.informed__consent')

    if (!consent) return

    consent.addEventListener('scroll', function () {
        let currentScrollTop = consent.scrollTop,
            maxScrollHeight = consent.scrollHeight - consent.clientHeight;

        if (currentScrollTop === maxScrollHeight) {
            callback()
        }
    })
}

$(document).on('input', '[name=has-condition]', function (e) {
    let input = $(this),
        select = $('.select-condition'),
        $select_input = select.find('input'),
        select_input = document.querySelector('.select-condition input')

    $select_input.prop('required', input.val() === 'on')

    if (input.val() === 'on') {
        select.removeClass('hide')
    } else {
        select.addClass('hide')
        $select_input.removeClass('error')
    }
})

$(document).on('input', '[name=has-medicine], [name=has-drugs]', function (e) {
    let input = $(this),
        select = $('.select-medicine'),
        $select_input = select.find('input'),
        select_input = document.querySelector('.select-medicine input')

    $select_input.prop('required', input.val() === 'on')

    if (input.val() === 'on') {
        select.removeClass('hide')
    } else {
        select.addClass('hide')
        $select_input.removeClass('error')
    }
})

$(document).on('input', '.drugs-search-input', function (e) {
    let input = $(this)

    if (input.val().length < 3) {
        return
    }

    searchDrugs(input.val()).then(
        updateDrugsHint
    )
})

async function searchDrugs(q) {
    let data = {
            'action': 'search_drugs',
            'q': q
        },
        url = '/wp-admin/admin-ajax.php'

    const response = await fetch(url, {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: new URLSearchParams(data).toString(), // body data type must match "Content-Type" header
    })

    return response.json()
}

function updateDrugsHint(drugs) {
    let select = $('.select-medicine'),
        options = $('.select-medicine .form-options')

    drugs = drugs.data

    $('.select-medicine .option:not(:last)').remove()
    options.prepend(drugs)
    select.addClass('open')
}

$(document).on('input', '.conditions-search-input', function (e) {
    let input = $(this)

    if (input.val().length < 3) {
        return
    }

    searchConditions(input.val()).then(
        updateConditionsHint
    )
})

async function searchConditions(q) {
    let data = {
            'action': 'search_diseases',
            'q': q
        },
        url = '/wp-admin/admin-ajax.php'

    const response = await fetch(url, {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: new URLSearchParams(data).toString(), // body data type must match "Content-Type" header
    })

    return response.json()
}

function updateConditionsHint(conditions) {
    let select = $('.select-condition'),
        options = $('.select-condition .form-options')

    conditions = conditions.data

    $('.select-condition .option:not(:last)').remove()
    options.prepend(conditions)
    select.addClass('open')
}

function unlockConsentFields() {
    let consent_firstname = document.querySelector('[name=consent_firstname]'),
        consent_lastname = document.querySelector('[name=consent_lastname]'),
        informed__consent = $('.informed__consent')

    consent_firstname.removeAttribute('readonly')
    consent_lastname.removeAttribute('readonly')
    informed__consent.removeClass('error')
}

function unlockConsentAgree(currentInput, validateResult) {
    let consent_firstname = document.querySelector('[name=consent_firstname]'),
        consent_lastname = document.querySelector('[name=consent_lastname]'),
        checkbox = document.querySelector('[name=agree-info]')

    if (currentInput.name !== "consent_firstname" && currentInput.name !== "consent_lastname") {
        return
    }

    if (validateResult) {
        checkbox.removeAttribute('disabled')
    } else {
        checkbox.setAttribute('disabled', '')
        checkbox.checked = false
    }
}

$(document).on('click', '[name=consent_firstname], [name=consent_lastname]', function (e) {
    let informed__consent = $('.informed__consent')

    if ($(this).is('[readonly]')) {
        informed__consent.addClass('error')
    }
})

$(document).on('click', '.download-consent-information', function (e) {
    e.preventDefault()

    let data = {
        'action': 'generate_consent_pdf'
    }

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: data,
        xhrFields: {responseType: 'blob'},
        dataType: 'binary',
        success: function (file) {
            const fileURL = URL.createObjectURL(file),
                link = document.createElement('a')

            link.href = fileURL;
            link.download = 'consent_form.pdf';
            link.click();
        },
        error: function () {
            console.log('Error')
        }
    })
})

function editHealthInformationForm() {
    let form = document.querySelector('.js-edit-health-information')

    if (!form) return

    form.addEventListener('keyup', function (e) {
        validateInput(e.target)
    })

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        e.stopPropagation()
        let formInputs = e.currentTarget.querySelectorAll('input[required]'),
            validate = true

        for (let k = 0; k < formInputs.length; k++) {
            if (!validateInput(formInputs[k])) {
                validate = false
            }
        }

        if (validate) {
            submitHealthInformationForm()
        }
    })
}

function submitHealthInformationForm() {
    let form = $('.js-edit-health-information')

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                $('.health-information').html(response.data.html)
                noticeMessage(response.data.message)
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
}

$(document).on('click', '.choice-delete', function (e) {
    e.preventDefault()

    let btn = $(this),
        choice = btn.closest('.choice'),
        wrapper = btn.closest('.hint'),
        select = wrapper.find('.hint-select'),
        input = select.find('input'),
        choices = btn.parents('.choices')

    choice.remove()

    if (choices.has('div').length === 0) {
        input.prop('required', true)
    }
})

$(document).on('click', '.choice-add', function (e) {
    e.preventDefault()

    let btn = $(this),
        wrapper = btn.closest('.hint'),
        select = wrapper.find('.hint-select'),
        choices = wrapper.find('.choices'),
        input = select.find('input'),
        selectName = wrapper.data('name'),
        choice = ''

    if (input.val().length === 0) {
        return
    }

    choice = '<div class="choice">' +
        '<div class="choice-row">' +
        '<div class="choice-name">' +
        input.val() +
        '</div>' +
        '<div class="choice-delete"></div>' +
        '<input type="hidden" name="' + selectName + '" value="' + input.val() + '">' +
        '</div>' +
        '</div>'

    wrapper.removeClass('open')
    choices.append(choice)
    input.val('')
    input.prop('required', false)
})

$(document).on('click', '.change-phone', function (e) {
    e.preventDefault()

    $('.account-content__edit-btn').removeClass('active')
    $('.personal-information').addClass('hide')
    $('[data-step=1]').toggleClass('active')
})

$(document).on('click', '.close_edit_phone', function (e) {
    e.preventDefault()

    $('.account-content__edit-btn').addClass('active')
    $('.personal-information').removeClass('hide')
    $('.form__step').removeClass('active')
})

$(document).on('click', '.account-content__edit-btn', function (e) {
    e.preventDefault()

    $(this).removeClass('active')
    $('.account-content__close-btn').addClass('active')
})

$(document).on('click', '.account-content__close-btn', function (e) {
    e.preventDefault()

    $(this).removeClass('active')
    $('.account-content__edit-btn').addClass('active')
})

$(document).on('submit', '.js-change-phone', function (e) {
    e.preventDefault()

    let form = $(this)

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                $('.personal-information').removeClass('hide')
                form.find('.form__step').removeClass('active')
                noticeMessage(response.data)
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
})

$(document).on('submit', '.js-edit-personal-info', function (e) {
    e.preventDefault()

    let form = $(this)

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: form.serializeArray(),
        success: function (response) {
            if (response.success === true) {
                $('.personal-information').html(response.data.html)
                noticeMessage(response.data.message)
            } else {
                errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
})

$(document).on('click', '.js-form-cancel', function (e) {
    e.preventDefault()

    let btn = $(this),
        data = {
            action: btn.data('action'),
            name: btn.data('name')
        }

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: data,
        success: function (response) {
            if (response.success === true) {
                btn.parents('form').html(response.data)
                //noticeMessage(response.data)
            } else {
                //errorMessage(response.data)
            }
        },
        error: function () {
            console.log('Error')
        }
    })
})
