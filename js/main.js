
$(document).ready(function(){

    $.easing.easeOutX = function(x) {
        return Math.sqrt(1 - Math.pow(x - 1, 2));
    };

    $('.stats-number').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000 + Math.floor(Math.random() * 2000),
            easing: 'easeOutX',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    $.fn.isOnScreen = function () {
        var win = $(window);

        var viewport = {
            top: win.scrollTop(),
            left: win.scrollLeft()
        };
        viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();

        var bounds = this.offset();
        bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();

        return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

    };

    function elementInViewport(el) {
        var top = el.offsetTop;
        var left = el.offsetLeft;
        var width = el.offsetWidth;
        var height = el.offsetHeight;

        while (el.offsetParent) {
            el = el.offsetParent;
            top += el.offsetTop;
            left += el.offsetLeft;
        }

        return (
            top >= window.pageYOffset &&
            left >= window.pageXOffset &&
            (top + height) <= (window.pageYOffset + window.innerHeight) &&
            (left + width) <= (window.pageXOffset + window.innerWidth)
        );
    }


    $('.hamburger').click((e)=>{
        $('.shadow').toggle();
        $('.hamburger').toggleClass('is-active');
        $('nav.mobile').toggleClass('visible');

        $('main').toggleClass('blurred');
    });

    $('.slider').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        infinite: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,

        responsive: [
            {
                breakpoint: 750,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                    dots: true
                }
            }
        ],
    });

    $('.slider-4').slick({
        autoplay: true,
        autoplaySpeed: 8000,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 750,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            }
        ],
    });

    $('.slider-single').slick({
        // autoplay: true,
        autoplaySpeed: 10000,
        infinite: true,
        arrows: true,
        adaptiveHeight: true,
        // slidesToShow: 3,
        // slidesToScroll: 1,
    });

    var browser = (function() {
        return {
            // Opera 8.0+
            Opera : (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0,

			// Firefox 1.0+
            Firefox:  typeof InstallTrigger !== 'undefined',

			// Chrome 1+
            Chrome : !!window.chrome && !!window.chrome.webstore
        }
    }());



	$("button#form-submit").click(function(e){
		e.preventDefault();
		var email = $("#form-email").val();
		var name = $("#form-name").val() || "Гость";
		var msg = $("#form-msg").val();
		var bc = $("#form-name").css("border-color");

		if (!validateEmail(email))
			$("#form-email").css("border-color", "red");
		if (!msg)
			$("#form-msg").css("border-color", "red");
		if (validateEmail(email))
			$("#form-email").css("border-color", bc);
		if (msg)
			$("#form-msg").css("border-color", bc);

		if ( validateEmail(email) && $("#form-msg").val() )
		{
			var txtOk   = $('button#form-submit').attr('data-ok');
			var txtFail = $('button#form-submit').attr('data-fail');
			var txtOnIt = $('button#form-submit').attr('data-onit');
			var txtDef  = $('button#form-submit').attr('data-def');
			var txtTry  = $('button#form-submit').attr('data-try');

			$("button#form-submit").typeIt({
							startDelete: true,
							strings: [txtOnIt],
							speed: 25,
							cursor: false,
							autoStart: false
						}).tiSettings({speed: 300}).tiType('.........');
			console.log("sending email");
			$.ajax({
				type: "POST",
				data: "name=" + name + "&email=" + email + "&msg=" + msg,
				url: 'sendmail.php',
				success: function(data){
					//alert('Load was performed. Got: ' + data);
					if ( data == 1 ) {
						$("button#form-submit").typeIt({
							startDelete: true,
							strings: [txtOk],
							speed: 50,
							cursor: false,
							autoStart: false
						})
						.tiPause(5000).tiDelete()
						.tiSettings({speed: 180}).tiType(txtDef);
					} else {
						$("button#form-submit").typeIt({
							startDelete: true,
							strings: [txtFail],
							speed: 50,
							cursor: false,
							autoStart: false
						})
						.tiPause(4000).tiDelete()
						.tiSettings({speed: 110}).tiType(txtTry);
					}
				}
			});
		}

	});

	function validateEmail(email)
	{
		var regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi;
		return regex.test(email);
	}

    function counter(el, start = 0, end, duration) {
        let current   = start,
            range     = end - start,
            increment = end > start ? 50 : -1,
            step  = Math.abs(Math.floor(duration / range)),

            timer = setInterval(() => {
                current += increment;
                el.text(current);
                if (current >= end) {
                    clearInterval(timer);
                }
            }, step);
    }

});
