

<aside class="w-72 bg-white shadow-lg flex flex-col h-screen sticky top-0">
    <div class="p-6 text-2xl bg-blue-500 font-bold border-b rounded text-fuchsia-900">Dashboard</div>
    
    <!-- // Affiche un menu de navigation différent pour les utilisateurs avec le rôle "admin" -->
    @if(Auth::user()->role === 'admin')
      <nav class="flex-1 mt-6 px-4 space-y-2 overflow-y-auto">
      <a href="#" class="flex items-center p-3 rounded hover:bg-gray-100">
        <span class="material-icons mr-3">dashboard</span> Home
      </a>
      <a href="#" class="flex items-center p-3 rounded hover:bg-gray-100">
        <span class="material-icons mr-3">people</span> Users
      </a>
      <a href="/admin/categories" class="flex items-center p-3 rounded hover:bg-gray-100">
        <span class="material-icons mr-3">bar_chart</span> Product Categories
      </a>
      <a href="/admin/product" class="flex items-center p-3 rounded hover:bg-gray-100">
        <span class="material-icons mr-3">bar_chart</span> Products List
      </a>
      <a href="#" class="flex items-center p-3 rounded hover:bg-gray-100">
        <span class="material-icons mr-3">settings</span> Settings
      </a>
      </nav>

      <!-- // Affiche un menu de navigation différent pour les utilisateurs avec le rôle "client" -->
    @elseif(Auth::user()->role === 'client') 
    @endif


    <div class="p-6 border-t">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="w-full bg-blue-600 hover:bg-red-700 text-white py-2 rounded transition">Logout</button>
      </form>
    </div>
</aside>