/***************************************************************

JavaScript

***************************************************************/
window.addEventListener('load', function(){

	// オープニングの演出
	const opening = document.querySelector('.js-opening');
	const openingTitle = document.querySelector('.js-opening-title');
	const openingLines = document.querySelectorAll('.js-opening-line');

	//タイトルをアコーディオンさせる
	const accordion = function(){
		openingTitle.classList.add('is-accordion');
	}

	// オープニングタイトルを上にフェイドアウトさせる
	const upFade = function(){
		openingTitle.classList.add('is-upFade');
	}

	// レイヤーをフェイドアウトさせる
	const fadeOut = function(){
		opening.classList.add('is-fade');
	}

	// オープニングの演出を初回のみに制御
	const keyName = 'visited';
	const keyValue = true;

	if(!sessionStorage.getItem(keyName)){
		// 初回アクセス
		sessionStorage.setItem(keyName, keyValue);

		openingLines.forEach(openingLine => {
			openingLine.classList.add('is-stretch'); //２つのラインを右に伸ばす
		});
		setTimeout(accordion, 2200); //アコーディオン開始
		setTimeout(upFade, 5000); //タイトルを上にフェイドアウト
		setTimeout(fadeOut, 6500); //レイヤーをフェイドアウト

	}else{
		// ２回目以降のアクセス
		opening.style.display = 'none';

		// openingLines.forEach(openingLine => {
		// 	openingLine.classList.add('is-stretch'); //２つのラインを右に伸ばす
		// });
		// setTimeout(accordion, 2200); //アコーディオン開始
		// setTimeout(upFade, 5000); //タイトルを上にフェイドアウト
		// setTimeout(fadeOut, 6500); //レイヤーをフェイドアウト
	}

	// オープニングの演出


	//intersectionObserver
	const contents = document.querySelectorAll('.js-inview');

	const cb = function(entries, observer){
		entries.forEach(entry => {
			if(entry.isIntersecting){
				entry.target.classList.add('is-inview');
				observer.unobserve(entry.target); //監視を打ち切る。
			}else{
				entry.target.classList.remove('is-inview');
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
	//intersectionObserver

});


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

	// swiper トップページ　メインビジュアル
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
	// swiper トップページ　メインビジュアル


	// swiper　トップページ　WORKSセクション
	const worksOptions = {
		grabCursor: true,
		direction: 'horizontal',
		spaceBetween: 20,
		slidesPerView: 1.3,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
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
	// swiper　トップページ　WORKSセクション

	// swiper　トップページ　BLOGセクション
	const blogOptions = {
		grabCursor: true,
		direction: 'horizontal',
		spaceBetween: 20,
		slidesPerView: 1.3,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
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
	// swiper　トップページ　BLOGセクション
	

	// トップに戻るボタン
	const pageTopBtn = document.querySelector('.js-page-top');

	window.addEventListener('scroll', function(){
		const currentY = window.pageYOffset;

		if(currentY > 100){
			pageTopBtn.classList.add('is-top');
		}else{
			pageTopBtn.classList.remove('is-top');
		}
	});

	pageTopBtn.addEventListener('click', function(){
		window.scrollTo({
				top: 0,
				behavior: "smooth"
		});
	});
	// トップに戻るボタン

});
