import Swiper from 'swiper/bundle';
import smoothscroll from 'smoothscroll-polyfill';
smoothscroll.polyfill();


/***************************************************************

JavaScript

***************************************************************/
window.addEventListener('load', () => {

	/***************************************************************
	オープニングの演出
	***************************************************************/
	const globalContainer = document.getElementById('js-global-container');
	const opening = document.getElementById('js-opening');
	const openingTitle = document.getElementById('js-opening-title');

	// タイトルをアコーディオンさせる
	const accordion = () => {
		openingTitle.classList.add('is-accordion');
	};

	// オープニングタイトルを上にフェイドアウトさせる
	const upFade = function(){
		openingTitle.classList.add('is-upFade');
	};

	// レイヤーをフェイドアウトさせる
	const fadeOut = function(){
		opening.classList.add('is-fade');
	};

	// オープニングの演出を初回のみに制御
	const webStorage = () => {
		if(sessionStorage.getItem('access')){
			// console.log('2回目以降のアクセスです');

			opening.style.display = 'none';
			globalContainer.style.opacity = '1';

		}else{
			// console.log('1回目のアクセスです');
			sessionStorage.setItem('access', 0);

			globalContainer.style.opacity='1';
			
			setTimeout(accordion, 1000); //アコーディオン開始
			setTimeout(upFade, 3500); //タイトルを上にフェイドアウト
			setTimeout(fadeOut, 5000); //レイヤーをフェイドアウト
		}
	};

	webStorage();

	/***************************************************************
	intersectionObserver
	***************************************************************/
	// コールバック
	const cb = (entries, observer) => {
		entries.forEach((entry) => {
			if(entry.isIntersecting){
				entry.target.classList.add('is-inview');
				observer.unobserve(entry.target); //監視を打ち切る。
			}else{
				entry.target.classList.remove('is-inview');
			}
		});
	};

	// オプション
	const options = {
		root: null,
		rootMargin: '-10% 0px',  //0にもpxなど単位をつける。
		threshold: 0,
	};

	const contents = document.querySelectorAll('.js-inview');

	const io = new IntersectionObserver(cb, options);

	contents.forEach((content) => {
		io.observe(content);
	});
});


document.addEventListener('DOMContentLoaded', () => {
	/***************************************************************
	カーソル
	***************************************************************/
	const cursor = document.getElementById('js-cursor');

	if(window.navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/i)){
		// スマホ、タブレット(iOS、Android)の場合の処理

		// PC以外は新しく作った擬似カーソルを消す。
		cursor.style.display = 'none';

	}else{
		// PCの場合の処理

		// デフォルトのカーソルを消すして擬似カーソルを適用。
		document.body.style.cursor = 'none';

		let mouseX = 0;
		let mouseY = 0;

		// カーソルが画面に入ってきた時
		document.addEventListener('mousemove', (event) => {
			// console.log(event);
			mouseX = event.pageX; // 左からの位置
			mouseY = event.pageY; // 上からの位置

			cursor.style.transform = `translate(${mouseX}px, ${mouseY}px)`;
			cursor.style.opacity = '1';
			cursor.style.visibility = 'visible';
		});

		// カーソルが画面から出た時
		document.addEventListener('mouseout', () => {
			cursor.style.opacity = '0';
			cursor.style.visibility = 'hidden';
		});
	}


	/***************************************************************
	ハンバーガーメニュー・ドロワーメニュー開閉
	***************************************************************/
	const hamburger = document.getElementById('js-hamburger');

	const hamburgerBtn = document.getElementById('js-hamburger-btn');
	const hamburgerMenus = document.getElementById('js-hamburger-menus');
	const drawerLinks = document.querySelectorAll('.js-link');

	const header = document.getElementById('js-header');
	const drawer = document.getElementById('js-drawer');

	hamburger.addEventListener('click', () => {
		hamburgerBtn.classList.toggle('is-open');
		hamburgerMenus.classList.toggle('is-switch')
		header.classList.toggle('is-blend');
		drawer.classList.toggle('is-slide');
	});

	drawerLinks.forEach((drawerLink) => {
		drawerLink.addEventListener('click', () => {
			hamburgerBtn.classList.toggle('is-open');
			hamburgerMenus.classList.toggle('is-switch');
			header.classList.toggle('is-blend');
			drawer.classList.toggle('is-slide');
		});
	});

	/***************************************************************
	スムーススクロール
	***************************************************************/

	const smoothScrollTriggers = document.querySelectorAll('a[href^="#"]');

	smoothScrollTriggers.forEach((smoothScrollTrigger) => {
		smoothScrollTrigger.addEventListener('click', (event) => {
			event.preventDefault();

			// urlを取得
			const href = smoothScrollTrigger.getAttribute('href');
			// #を省く
			const targetElement = document.getElementById(href.replace('#', ''));
			// ブラウザのトップからの位置を取得
			const rect = targetElement.getBoundingClientRect().top;
			// スクロール量を取得
			const offset = window.pageYOffset;

			const target = rect + offset;

			window.scrollTo({
				top: target,
				behavior: 'smooth',
			});
		});
	});

	/***************************************************************
	swiper トップページ メインビジュアル
	***************************************************************/
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

		const mvSwiper = new Swiper('.swiper-mv', mvOptions); // eslint-disable-line
	}

	/***************************************************************
	swiper トップページ WORKSセクション
	***************************************************************/
	const worksOptions = {
		// grabCursor: true,
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

	const worksSwiper = new Swiper('.swiper-works', worksOptions); // eslint-disable-line

	/***************************************************************
	swiper トップページ BLOGセクション
	***************************************************************/
	const blogOptions = {
		// grabCursor: true,
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
	const blogSwiper = new Swiper('.swiper-blog', blogOptions); // eslint-disable-line
	
	/***************************************************************
	トップに戻るボタン
	***************************************************************/
	const pageTopBtn = document.getElementById('js-page-top');

	window.addEventListener('scroll', () => {
		const currentY = window.pageYOffset;

		if(currentY > 100){
			pageTopBtn.classList.add('is-top');
		}else{
			pageTopBtn.classList.remove('is-top');
		}
	});

	pageTopBtn.addEventListener('click', () => {
		window.scrollTo({
				top: 0,
				behavior: "smooth"
		});
	});

	/***************************************************************
	works シングルページ PREVボタン 
	***************************************************************/
	// aタグ
	const prevBtn = document.querySelector('a[rel^="next"]');
	if(prevBtn){
		// console.log(prevBtn);
		prevBtn.className = 'c-btn-prev';

		// 矢印本体
		const prevBtnAllow = document.createElement('span');
		prevBtnAllow.className = 'c-btn-prev__allow';
		prevBtn.appendChild(prevBtnAllow);

		// 矢印の先
		const prevBtnAllowTip = document.createElement('span');
		prevBtnAllowTip.className = 'c-btn-prev__allow-tip';
		prevBtnAllow.appendChild(prevBtnAllowTip);
		
		// ライン
		const prevBtnAllowLine = document.createElement('span');
		prevBtnAllowLine.className = 'c-btn-prev__allow-line';
		prevBtnAllow.appendChild(prevBtnAllowLine);
		
		// テキスト
		const prevBtnText = document.createElement('div');
		prevBtnText.className = 'c-btn-prev__text';
		prevBtnText.textContent = 'prev';
		prevBtn.appendChild(prevBtnText);
	}
	
	/***************************************************************
	works シングルページ NEXTボタン
	***************************************************************/
	// aタグ
	const nextBtn = document.querySelector('a[rel^="prev"]');
	if(nextBtn){
		nextBtn.className = 'c-btn-next';

		// テキスト
		const nextBtnText = document.createElement('div');
		nextBtnText.className = 'c-btn-next__text';
		nextBtnText.textContent = 'next';
		nextBtn.appendChild(nextBtnText);

		// 矢印本体
		const nextBtnAllow = document.createElement('span');
		nextBtnAllow.className = 'c-btn-next__allow';
		nextBtn.appendChild(nextBtnAllow);
		// ライン
		const nextBtnAllowLine = document.createElement('span');
		nextBtnAllowLine.className = 'c-btn-next__allow-line';
		nextBtnAllow.appendChild(nextBtnAllowLine);
		// 矢印の先
		const nextBtnAllowTip = document.createElement('span');
		nextBtnAllowTip.className = 'c-btn-next__allow-tip';
		nextBtnAllow.appendChild(nextBtnAllowTip);
	}
	
});
