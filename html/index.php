<?php
$items = array_filter(glob(__DIR__ . '/*'), function ($path) {
    return basename($path)[0] !== '.' && basename($path) !== 'vendor';
});

usort($items, function ($a, $b) {
    return filemtime($b) - filemtime($a);
});

function getFileIcon($name, $isDir) {
    if ($isDir) return '📁';
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    return match ($ext) {
        'php' => '🐘',
        'html', 'htm' => '🌐',
        'md' => '📑',
        'txt' => '📝',
        'json' => '🔧',
        'js' => '📜',
        'css' => '🎨',
        'jpg', 'jpeg', 'png', 'gif', 'svg' => '🖼️',
        'zip', 'rar' => '🗜️',
        default => '📄',
    };
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>🚀 Dev Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.9/dist/typography.min.css" rel="stylesheet" />
  <style>
    .fade-in { animation: fadeInUp 0.6s ease forwards; opacity: 0; transform: translateY(20px); }
    @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
  </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <header class="bg-blue-600 text-white py-5 text-center text-3xl font-bold shadow relative">
    🚀 Dev Dashboard
    <button onclick="openModal()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm bg-white text-blue-600 font-medium px-2.5 py-1 rounded-md border border-blue-200 hover:bg-blue-50 transition">
      📖 README
    </button>
  </header>

  <main class="max-w-6xl mx-auto px-6 py-10">

    <!-- Frontend -->
    <section class="mb-10">
      <h2 class="text-xl font-semibold mb-4">🌐 Frontend</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">⚡</div>
          <div class="font-medium">Vite Frontend</div>
          <a href="https://localhost:3000" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
      </div>
    </section>

    <!-- Backend -->
    <section class="mb-10">
      <h2 class="text-xl font-semibold mb-4">🐍 Backend</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">🐍</div>
          <div class="font-medium">Python API</div>
          <a href="https://localhost:5000" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
      </div>
    </section>

    <!-- Dev Tools -->
    <section class="mb-10">
      <h2 class="text-xl font-semibold mb-4">🛠️ Dev Tools</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">📂</div>
          <div class="font-medium">File Browser</div>
          <a href="http://localhost:8082" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">📬</div>
          <div class="font-medium">MailHog</div>
          <a href="http://localhost:8025" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
      </div>
    </section>

    <!-- Databases -->
    <section class="mb-10">
      <h2 class="text-xl font-semibold mb-4">🛢️ Databases</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">🛠️</div>
          <div class="font-medium">PHPMyAdmin</div>
          <a href="http://localhost:8081" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">🛢️</div>
          <div class="font-medium">Adminer</div>
          <a href="http://localhost:8083" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
        <div class="bg-white rounded shadow p-4 text-center text-sm fade-in transition-transform transform hover:scale-105 duration-300 hover:shadow-lg hover:bg-gray-50">
          <div class="text-3xl mb-2">🐘</div>
          <div class="font-medium">PgAdmin</div>
          <a href="http://localhost:8084" target="_blank" class="text-blue-600 hover:underline mt-2 inline-block">Open</a>
        </div>
      </div>
    </section>

    <!-- Local Files & Folders -->
    <section class="mb-10">
      <h2 class="text-xl font-semibold mb-4">📁 Files & Folders</h2>
      <div class="bg-white rounded-lg shadow p-4 overflow-x-auto">
        <table class="w-full text-left text-sm">
          <thead class="border-b text-gray-700 font-semibold">
            <tr>
              <th class="py-2 px-3">Type</th>
              <th class="py-2 px-3">Name</th>
              <th class="py-2 px-3">Size</th>
              <th class="py-2 px-3">Last Modified</th>
              <th class="py-2 px-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item): ?>
              <?php
                $name = basename($item);
                $isDir = is_dir($item);
                $icon = getFileIcon($name, $isDir);
                $size = $isDir ? '-' : number_format(filesize($item) / 1024, 2) . ' KB';
                $modified = date("Y-m-d H:i", filemtime($item));
                $link = htmlspecialchars($name) . ($isDir ? '/' : '');
              ?>
              <tr class="border-t hover:bg-gray-50">
                <td class="py-2 px-3"><?= $icon ?></td>
                <td class="py-2 px-3"><?= htmlspecialchars($name) ?></td>
                <td class="py-2 px-3"><?= $size ?></td>
                <td class="py-2 px-3"><?= $modified ?></td>
                <td class="py-2 px-3">
                  <a href="<?= $link ?>" target="_blank" class="text-blue-600 hover:underline">Open</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

  </main>

  <!-- README Modal -->
  <div id="readmeModal" class="fixed inset-0 bg-black/50 z-50 hidden">
    <div onclick="closeModal()" class="absolute inset-0"></div>
    <div class="relative z-10 max-w-4xl mx-auto my-16 bg-white rounded-lg shadow-lg p-6 overflow-y-auto max-h-[80vh]">
      <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold leading-none">&times;</button>
      <h2 class="text-2xl font-bold mb-4 border-b pb-2">📖 README.md</h2>
      <article id="readmeContent" class="prose prose-sm sm:prose lg:prose-lg max-w-none text-left"></article>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <script>
    function openModal() {
      const modal = document.getElementById('readmeModal');
      modal.classList.remove('hidden');
      document.getElementById('readmeContent').innerHTML = '<p class="text-gray-400 italic">Loading README...</p>';

      fetch('https://raw.githubusercontent.com/shaweesh/docker-php/refs/heads/master/readme.md')
        .then(res => res.ok ? res.text() : Promise.reject())
        .then(md => document.getElementById('readmeContent').innerHTML = marked.parse(md))
        .catch(() => {
          document.getElementById('readmeContent').innerHTML =
            "<p class='text-red-600'>⚠️ Could not load README.</p>";
        });
    }

    function closeModal() {
      document.getElementById('readmeModal').classList.add('hidden');
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeModal();
    });
  </script>

</body>
</html>
