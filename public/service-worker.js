const CACHE_NAME = 'my-site-cache-v1';
const urlsToCache = [
    '/offline'
];

// Install the service worker and cache the specified resources
self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function(cache) {
                console.log('Opened cache');
                return cache.addAll(urlsToCache);
            })
    );
});

// Intercept fetch requests and serve cached resources if available
self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
            .then(function(response) {
                if (response) {
                    return response; // Return the cached resource
                }
                return fetch(event.request); // Fetch from the network if not in cache
            })
            .catch(function() {
                // Optional: Return an offline page or fallback resource
                return caches.match('/offline');
            })
    );
});

// Update the service worker and clear old caches
self.addEventListener('activate', function(event) {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
