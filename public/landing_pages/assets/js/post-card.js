const data = [
    {
        place:'Switzerland Alps',
        title:'SAINT',
        title2:'ANTONIEN',
        description:'Tucked away in the Switzerland Alps, Saint Antönien offers an idyllic retreat for those seeking tranquility and adventure alike. It\'s a hidden gem for backcountry skiing in winter and boasts lush trails for hiking and mountain biking during the warmer months.',
        image:'landing_pages/post-card/01.jpg'
    },
    {
        place:'Japan Alps',
        title:'NANGANO',
        title2:'PREFECTURE',
        description:'Nagano Prefecture, set within the majestic Japan Alps, is a cultural treasure trove with its historic shrines and temples, particularly the famous Zenko-ji. The region is also a hotspot for skiing and snowboarding, offering some of the country\'s best powder.',
        image:'landing_pages/post-card/02.jpg'
    },
    {
        place:'Sahara Desert ',
        title:'MARRAKECH',
        title2:'MEROUGA',
        description:'The journey from the vibrant souks and palaces of Marrakech to the tranquil, starlit sands of Merzouga showcases the diverse splendor of Morocco. Camel treks and desert camps offer an unforgettable immersion into the nomadic way of life.',
        image:'landing_pages/post-card/03.jpg'
    },
    {
        place:'Sierra Nevada - USA',
        title:'YOSEMITE',
        title2:'NATIONAL PARAK',
        description:'Yosemite National Park is a showcase of the American wilderness, revered for its towering granite monoliths, ancient giant sequoias, and thundering waterfalls. The park offers year-round recreational activities, from rock climbing to serene valley walks.',
        image:'landing_pages/post-card/04.jpg'
    },
    {
        place:'Tarifa - Spain',
        title:'LOS LANCES',
        title2:'BEACH',
        description:'Los Lances Beach in Tarifa is a coastal paradise known for its consistent winds, making it a world-renowned spot for kitesurfing and windsurfing. The beach\'s long, sandy shores provide ample space for relaxation and sunbathing, with a vibrant atmosphere of beach bars and cafes.',
        image:'landing_pages/post-card/05.jpg'
    },
    {
        place:'Cappadocia - Turkey',
        title:'Göreme',
        title2:'Valley',
        description:'Göreme Valley in Cappadocia is a historical marvel set against a unique geological backdrop, where centuries of wind and water have sculpted the landscape into whimsical formations. The valley is also famous for its open-air museums, underground cities, and the enchanting experience of hot air ballooning.',
        image:'landing_pages/post-card/07.jpg'
    },
]

// Add indicator element for transitions
document.body.insertAdjacentHTML('beforeend', '<div class="indicator"></div>');

const _ = (id)=>document.getElementById(id)
const cards = data.map((i, index)=>`<div class="card" id="card${index}" style="background-image:url(${i.image})"  ></div>`).join('')



const cardContents = data.map((i, index)=>`<div class="card-content" id="card-content-${index}">
<div class="content-start"></div>
<div class="content-place">${i.place}</div>
<div class="content-title-1">${i.title}</div>
<div class="content-title-2">${i.title2}</div>

</div>`).join('')


const sildeNumbers = data.map((_, index)=>`<div class="item" id="slide-item-${index}" >${index+1}</div>`).join('')
_('demo').innerHTML =  cards + cardContents
_('slide-numbers').innerHTML =  sildeNumbers


// Generate the 3-grid post cards
function generatePostCards() {
    const postCardsGrid = document.getElementById('post-cards-grid');
    if (!postCardsGrid) return;

    const postCardsHTML = data.map(item => `
        <div class="post-card-item">
            <div class="post-card-image" style="background-image: url(${item.image})"></div>
            <div class="post-card-content">
                <div class="post-card-place">${item.place}</div>
                <h3 class="post-card-title">${item.title} ${item.title2}</h3>
                <p class="post-card-desc">${item.description}</p>
                <div class="post-card-cta">
                    <button class="post-card-bookmark" aria-label="Bookmark">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <button class="post-card-discover">Discover </button>
                </div>
            </div>
        </div>
    `).join('');

    postCardsGrid.innerHTML = postCardsHTML;
}

// Add this function after generatePostCards()

function setupPopupHandlers() {
    const popup = document.getElementById('post-popup');
    const popupClose = document.getElementById('popup-close');
    const popupImage = document.getElementById('popup-image');
    const popupPlace = document.getElementById('popup-place');
    const popupTitle = document.getElementById('popup-title');
    const popupDescription = document.getElementById('popup-description');

    // Close popup when clicking the close button
    if (popupClose) {
        popupClose.addEventListener('click', () => {
            popup.classList.remove('active');
            document.body.classList.remove('popup-open');
        });
    }

    // Close popup when clicking outside the content
    if (popup) {
        popup.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.classList.remove('active');
                document.body.classList.remove('popup-open');
            }
        });
    }

    // Add click handlers to all discover buttons in post cards
    const discoverButtons = document.querySelectorAll('.post-card-discover');
    discoverButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const item = data[index % data.length]; // Use modulo to ensure we don't go out of bounds

            // Populate popup with data
            popupImage.src = item.image;
            popupPlace.textContent = item.place;
            popupTitle.textContent = `${item.title} ${item.title2}`;
            popupDescription.textContent = item.description;

            // Show popup
            popup.classList.add('active');
            document.body.classList.add('popup-open');
        });
    });

    // Also add click handler to the hero section discover button
    const heroDiscoverButtons = document.querySelectorAll('.discover');
    heroDiscoverButtons.forEach(button => {
        button.addEventListener('click', () => {
            const activeIndex = order[0]; // Get the currently active slide index
            const item = data[activeIndex];

            // Populate popup with data
            popupImage.src = item.image;
            popupPlace.textContent = item.place;
            popupTitle.textContent = `${item.title} ${item.title2}`;
            popupDescription.textContent = item.description;

            // Show popup
            popup.classList.add('active');
            document.body.classList.add('popup-open');
        });
    });
}

// Update the DOMContentLoaded event handler at the end of the file
document.addEventListener('DOMContentLoaded', () => {
    start().then(() => {
        generatePostCards();
        setupPopupHandlers(); // Add this line to call our new function
    });
});

// Add ESC key support to close popup
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        const popup = document.getElementById('post-popup');
        if (popup && popup.classList.contains('active')) {
            popup.classList.remove('active');
            document.body.classList.remove('popup-open');
        }
    }
});

const range = (n) =>
  Array(n)
    .fill(0)
    .map((i, j) => i + j);
const set = gsap.set;

function getCard(index) {
  return `#card${index}`;
}
function getCardContent(index) {
  return `#card-content-${index}`;
}
function getSliderItem(index) {
  return `#slide-item-${index}`;
}

function animate(target, duration, properties) {
  return new Promise((resolve) => {
    gsap.to(target, {
      ...properties,
      duration: duration,
      onComplete: resolve,
    });
  });
}

let order = [0, 1, 2, 3, 4, 5];
let detailsEven = true;

let offsetTop = 200;
let offsetLeft = 700;
let cardWidth = 200;
let cardHeight = 300;
let gap = 40;
let numberSize = 50;
const ease = "sine.inOut";

function init() {
    // Add this at the start of your init() function
    if (!document.querySelector('#details-even') || !document.querySelector('#details-odd')) {
        console.error('Required elements not found');
        return;
    }

  const [active, ...rest] = order;
  const detailsActive = detailsEven ? "#details-even" : "#details-odd";
  const detailsInactive = detailsEven ? "#details-odd" : "#details-even";
  const { innerHeight: height, innerWidth: width } = window;
  offsetTop = height - 430;
  offsetLeft = width - 830;

  gsap.set("#pagination", {
    top: offsetTop + 330,
    left: offsetLeft,
    y: 200,
    opacity: 0,
    zIndex: 60,
  });
  gsap.set("nav", { y: -200, opacity: 0 });

  gsap.set(getCard(active), {
    x: 0,
    y: 0,
    width: window.innerWidth,
    height: window.innerHeight,
  });
  gsap.set(getCardContent(active), { x: 0, y: 0, opacity: 0 });
  gsap.set(detailsActive, { opacity: 0, zIndex: 22, x: -200 });
  gsap.set(detailsInactive, { opacity: 0, zIndex: 12 });
  gsap.set(`${detailsInactive} .text`, { y: 100 });
  gsap.set(`${detailsInactive} .title-1`, { y: 100 });
  gsap.set(`${detailsInactive} .title-2`, { y: 100 });
  gsap.set(`${detailsInactive} .desc`, { y: 50 });
  gsap.set(`${detailsInactive} .cta`, { y: 60 });

  gsap.set(".progress-sub-foreground", {
    width: 500 * (1 / order.length) * (active + 1),
  });

  rest.forEach((i, index) => {
    gsap.set(getCard(i), {
      x: offsetLeft + 400 + index * (cardWidth + gap),
      y: offsetTop,
      width: cardWidth,
      height: cardHeight,
      zIndex: 30,
      borderRadius: 10,
    });
    gsap.set(getCardContent(i), {
      x: offsetLeft + 400 + index * (cardWidth + gap),
      zIndex: 40,
      y: offsetTop + cardHeight - 100,
    });
    gsap.set(getSliderItem(i), { x: (index + 1) * numberSize });
  });

  gsap.set(".indicator", { x: -window.innerWidth });

  const startDelay = 1.2;

  gsap.to(".cover", {
    x: width + 400,
    delay: 0.5,
    ease,
    onComplete: () => {
      setTimeout(() => {
        loop();
      }, 500);
    },
  });
  rest.forEach((i, index) => {
    gsap.to(getCard(i), {
      x: offsetLeft + index * (cardWidth + gap),
      zIndex: 30,
      delay: 0.6 * index,
      ease,
      delay: startDelay,
    });
    gsap.to(getCardContent(i), {
      x: offsetLeft + index * (cardWidth + gap),
      zIndex: 40,
      delay: 0.6 * index,
      ease,
      delay: startDelay,
    });
  });
  gsap.to("#pagination", { y: 0, opacity: 1, ease, delay: startDelay });
  gsap.to("nav", { y: 0, opacity: 1, ease, delay: startDelay });
  gsap.to(detailsActive, { opacity: 1, x: 0, ease, delay: startDelay });
}

let clicks = 0;

let isAnimating = false; // Add this near your other variables (at the top with other variables)

function step() {
    return new Promise((resolve) => {
      if (isAnimating) {
        resolve();
        return;
      }

      isAnimating = true;

      order.push(order.shift());
      detailsEven = !detailsEven;

      const detailsActive = detailsEven ? "#details-even" : "#details-odd";
      const detailsInactive = detailsEven ? "#details-odd" : "#details-even";

      document.querySelector(`${detailsActive} .place-box .text`).textContent =
        data[order[0]].place;
      document.querySelector(`${detailsActive} .title-1`).textContent =
        data[order[0]].title;
      document.querySelector(`${detailsActive} .title-2`).textContent =
        data[order[0]].title2;
      document.querySelector(`${detailsActive} .desc`).textContent =
        data[order[0]].description;

      // Use consistent timing for all animations
      const animDuration = TRANSITION_DURATION;

      gsap.set(detailsActive, { zIndex: 22 });
      gsap.to(detailsActive, { opacity: 1, delay: 0.4 * animDuration, ease });
      gsap.to(`${detailsActive} .text`, {
        y: 0,
        delay: 0.1 * animDuration,
        duration: 0.7 * animDuration,
        ease,
      });
      gsap.to(`${detailsActive} .title-1`, {
        y: 0,
        delay: 0.15 * animDuration,
        duration: 0.7 * animDuration,
        ease,
      });
      gsap.to(`${detailsActive} .title-2`, {
        y: 0,
        delay: 0.15 * animDuration,
        duration: 0.7 * animDuration,
        ease,
      });
      gsap.to(`${detailsActive} .desc`, {
        y: 0,
        delay: 0.3 * animDuration,
        duration: 0.4 * animDuration,
        ease,
      });
      gsap.to(`${detailsActive} .cta`, {
        y: 0,
        delay: 0.35 * animDuration,
        duration: 0.4 * animDuration,
        onComplete: resolve,
        ease,
      });
      gsap.set(detailsInactive, { zIndex: 12 });

      const [active, ...rest] = order;
      const prv = rest[rest.length - 1];

      gsap.set(getCard(prv), { zIndex: 10 });
      gsap.set(getCard(active), { zIndex: 20 });
      gsap.to(getCard(prv), { scale: 1.5, ease, duration: animDuration });

      gsap.to(getCardContent(active), {
        y: offsetTop + cardHeight - 10,
        opacity: 0,
        duration: 0.3 * animDuration,
        ease,
      });
      gsap.to(getSliderItem(active), { x: 0, ease, duration: animDuration });
      gsap.to(getSliderItem(prv), { x: -numberSize, ease, duration: animDuration });
      gsap.to(".progress-sub-foreground", {
        width: 500 * (1 / order.length) * (active + 1),
        ease,
        duration: animDuration
      });

      gsap.to(getCard(active), {
        x: 0,
        y: 0,
        ease,
        duration: animDuration,
        width: window.innerWidth,
        height: window.innerHeight,
        borderRadius: 0,
        onComplete: () => {
          const xNew = offsetLeft + (rest.length - 1) * (cardWidth + gap);
          gsap.set(getCard(prv), {
            x: xNew,
            y: offsetTop,
            width: cardWidth,
            height: cardHeight,
            zIndex: 30,
            borderRadius: 10,
            scale: 1,
          });

          gsap.set(getCardContent(prv), {
            x: xNew,
            y: offsetTop + cardHeight - 100,
            opacity: 1,
            zIndex: 40,
          });
          gsap.set(getSliderItem(prv), { x: rest.length * numberSize });

          gsap.set(detailsInactive, { opacity: 0 });
          gsap.set(`${detailsInactive} .text`, { y: 100 });
          gsap.set(`${detailsInactive} .title-1`, { y: 100 });
          gsap.set(`${detailsInactive} .title-2`, { y: 100 });
          gsap.set(`${detailsInactive} .desc`, { y: 50 });
          gsap.set(`${detailsInactive} .cta`, { y: 60 });
          clicks -= 1;
          if (clicks > 0) {
            step();
          }
          isAnimating = false; // Reset the flag when animation is complete
        },
      });

      rest.forEach((i, index) => {
        if (i !== prv) {
          const xNew = offsetLeft + index * (cardWidth + gap);
          gsap.set(getCard(i), { zIndex: 30 });
          gsap.to(getCard(i), {
            x: xNew,
            y: offsetTop,
            width: cardWidth,
            height: cardHeight,
            ease,
            duration: animDuration,
            delay: 0.1 * (index + 1) * animDuration,
          });

          gsap.to(getCardContent(i), {
            x: xNew,
            y: offsetTop + cardHeight - 100,
            opacity: 1,
            zIndex: 40,
            ease,
            duration: animDuration,
            delay: 0.1 * (index + 1) * animDuration,
          });
          gsap.to(getSliderItem(i), {
            x: (index + 1) * numberSize,
            ease,
            duration: animDuration
          });
        }
      });
    });
  }


  const SLIDE_DURATION = 3; // Time each slide stays visible (in seconds)
  const TRANSITION_DURATION = 0.8; // Time it takes to transition between slides (in seconds)

  // Replace your existing loop() function with this one
  async function loop() {
    // Wait for SLIDE_DURATION seconds before starting transition
    await new Promise(resolve => setTimeout(resolve, SLIDE_DURATION * 1000));

    // Start transition animation
    await animate(".indicator", TRANSITION_DURATION, { x: 0 });
    await animate(".indicator", TRANSITION_DURATION, { x: window.innerWidth, delay: 0.3 });
    set(".indicator", { x: -window.innerWidth });

    // Perform slide transition
    await step();

    // Continue the loop
    loop();
  }

async function loadImage(src) {
  return new Promise((resolve, reject) => {
    let img = new Image();
    img.onload = () => resolve(img);
    img.onerror = reject;
    img.src = src;
  });
}

async function loadImages() {
  const promises = data.map(({ image }) => loadImage(image));
  return Promise.all(promises);
}

async function start() {
  try {
    await loadImages();
    init();
  } catch (error) {
    console.error("One or more images failed to load", error);
  }
}

start()


// Add click handlers for arrows
document.querySelector('.arrow-left').addEventListener('click', () => {
    if (!isAnimating) {
      // Reverse the order array
      order.unshift(order.pop());
      clicks += 1;
      step();
    }
  });

  document.querySelector('.arrow-right').addEventListener('click', () => {
    if (!isAnimating) {
      clicks += 1;
      step();
    }
  });

  // Update keyboard handling for consistency
  document.addEventListener('keydown', (e) => {
    if (!isAnimating) {
      if (e.key === 'ArrowLeft') {
        // Reverse the order array
        order.unshift(order.pop());
        clicks += 1;
        step();
      } else if (e.key === 'ArrowRight') {
        clicks += 1;
        step();
      }
    }
  });

// Place this at the end of your file, replacing the existing start().then() call
document.addEventListener('DOMContentLoaded', () => {
    start().then(() => {
        generatePostCards();
    });
});
