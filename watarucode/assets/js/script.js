/***************************************************************

JavaScript

***************************************************************/
document.addEventListener('DOMContentLoaded', function(){

	// ハンバーガーメニュー
	const hamburgerBtn = document.querySelector('.js-hamburger-btn');
	const drawerLinks = document.querySelectorAll('.js-link');

	const header = document.querySelector('.js-header');
	const drawer = document.querySelector('.js-drawer');

	hamburgerBtn.addEventListener('click', function(){
		header.classList.toggle('is-blend');
		hamburgerBtn.classList.toggle('is-open');
		drawer.classList.toggle('is-slide');
	});

	// ドロワーメニュークリック時にハンバーガーメニューも開閉させる
	for(let i = 0; i < drawerLinks.length; i++){
		drawerLinks[i].addEventListener('click', function(){

			header.classList.toggle('is-blend');
			hamburgerBtn.classList.toggle('is-open');
			drawer.classList.toggle('is-slide');
		});
	}
	// ハンバーガーメニュー


	// スムーススクロール
	const smoothScrollTrigger = document.querySelectorAll('a[href^="#"]');

	for(let i = 0; i < smoothScrollTrigger.length; i++){
		smoothScrollTrigger[i].addEventListener('click', function(e){
			// デフォルトの動作をキャンセル
			e.preventDefault();
			
			// console.log(e.target); //イベントが発生した要素
			// console.log(e.type); //イベントの名前：
			// console.log(e.timeStamp); //イベントの発生時間
			// console.log(e.pageX); //クリックされたX座標

			//hrefの属性を取得する。
			let href = smoothScrollTrigger[i].getAttribute('href');
			// console.log(href);  例：#concept

			// #を省く
			let targetElement = document.getElementById(href.replace('#', ''));
			// console.log(targetElement);

			const rect = targetElement.getBoundingClientRect().top; //ブラウザからの位置を取得
			const offset = window.pageYOffset; //現在のスクロール量を取得

			const target = rect + offset;

			window.scrollTo({
				top: target,
				behavior: 'smooth',
			});
		});
	}
	// スムーススクロール

	// swiper mv
	// 2枚以上で動かす。
	const slideLength = document.querySelectorAll('.swiper-mv .swiper-slide').length;

	if(slideLength > 1){
		
		const mvOptions = {
			loop: true,
			centeredSlides: true,
			effect: 'fade',
			autoplay: {
				delay: 4000, //スライド間の間隔
				disableOnInteraction: false, //デフォルトはtrue。→操作があれば停止。
			},
			speed: 4000, //スライドのスピード
		};

		const mvSwiper = new Swiper('.swiper-mv', mvOptions);
	}
	// swiper mv


	// swiper　works
	const worksOptions = {
		grabCursor: true,
		direction: 'horizontal',
		spaceBetween: 20,
		slidesPerView: 1.3,

		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
			// type: 'custom',
			renderBullet: function(index, className){
				return '<div class="' + className + '">' + '0' + (index + 1) + '</div>';
			}
		},

		breakpoints: {
			768: {
				slidesPerView: 2.5,
			},
			960: {
				slidesPerView: 3,
			},
		},
	};

	const worksSwiper = new Swiper('.swiper-works', worksOptions);
	// swiper　works

	// swiper　blog
	const blogOptions = {
		grabCursor: true,
		direction: 'horizontal',
		spaceBetween: 20,
		slidesPerView: 1.3,

		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
			// type: 'custom',
			renderBullet: function(index, className){
				return '<div class="' + className + '">' + '0' + (index + 1) + '</div>';
			}
		},

		breakpoints: {
			768: {
				slidesPerView: 1.5,
			},
			960: {
				slidesPerView: 2,
			},
		},
	};

	const blogSwiper = new Swiper('.swiper-blog', blogOptions);
	// swiper　blog
	

	// IntersectionObserver 各セクションでのスクロールアニメーション。inview付与。
	const contents = document.querySelectorAll('.js-inview');

	const cb = function(entries, observer){
		entries.forEach(entry => {
			if(entry.isIntersecting){
				entry.target.classList.add('inview');
				observer.unobserve(entry.target); //監視を打ち切る。
			}else{
				entry.target.classList.remove('inview');
			}
		});
	}

	const options = {
		root: null,
		rootMargin: '-10% 0px',  //0にもpxなど単位をつける。　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
		threshold: 0,
	}

	const io = new IntersectionObserver(cb, options);
	contents.forEach(content => {
		io.observe(content);
	});
	// IntersectionObserver

	

});

