const cacheName = 'app-cache';

self.addEventListener('install', event => {
    event.waitUntil(
      caches.open('app-cache').then(cache => {
        return cache.addAll([
          '/index.html',
          '/css/home.css',
          '/js/home.js'
        ]).catch(error => {
          console.error('Falha ao adicionar recursos ao cache:', error);
          // Identifica quais recursos específicos causaram o erro
          error.forEach(url => console.error('Falha ao adicionar ao cache:', url));
        });
      })
    );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        if (response) {
          return response; // Retorna a resposta do cache se estiver disponível
        }
        return fetch(event.request) // Caso contrário, faz a requisição
          .then(response => {
            // Clona a resposta para armazená-la no cache
            const responseToCache = response.clone();
            caches.open(cacheName)
              .then(cache => {
                cache.put(event.request, responseToCache); // Armazena a resposta no cache
              });
            return response;
          });
      })
      .catch(error => {
        console.error('Falha ao buscar recurso do cache:', error);
        return fetch(event.request); // Se houver erro no cache, busca na rede
      })
  );
});
