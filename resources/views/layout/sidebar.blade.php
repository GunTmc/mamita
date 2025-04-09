<div class="absolute z-99 w-56 gap-4 items-center py-10 h-full bg-white  shadow-lg hidden" id="sidebar">
    <a href="{{ route('profile.properties') }}">
        @if (auth()->user()->image == null)
            <p class="text-center bg-gray-300 w-20 h-20 rounded-xl flex items-center justify-center  font-bold">
                No Image</p>
        @else
            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Avatar" class="w-20 h-20 rounded-full">
        @endif
    </a>

    <a class="hover:bg-gray-200 w-full text-center py-2" href="{{ route('pregnancy.index') }}">Perkembangan Kehamilan</a>
    <a class="hover:bg-gray-200 w-full text-center py-2" href="{{ route('child.index') }}">Perkembangan Anak</a>
    <a class="hover:bg-gray-200 w-full text-center py-2" href="{{ route('toDo.index') }}">To Do</a>
    <a class="hover:bg-gray-200 w-full text-center py-2" href="{{ route('food.index') }}">Food</a>
    <a class="hover:bg-gray-200 w-full text-center py-2" href="{{ route('activity.index') }}">Activity</a>

    <div class="mt-auto w-full">
        <a class="hover:bg-gray-200 w-full text-center py-2 block" href="{{ route('home') }}">Dashboard</a>
        <a class="hover:bg-gray-200 w-full text-center py-2 block text-red-600" href="{{ route('auth.logout') }}">Log
            out</a>
    </div>
</div>
<div class="w-full h-full bg-black opacity-50 z-1 hidden" id="overlay"></div>

<script>
    function toggleSidebar() {
        let sidebar = document.getElementById('sidebar');
        let overlay = document.getElementById('overlay');
        if (sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('hidden');
            sidebar.classList.add('flex', 'flex-col');
            overlay.classList.remove('hidden');
            overlay.classList.add('absolute');
        } else {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('flex', 'flex-col');
            overlay.classList.remove('absolute');
            overlay.classList.add('hidden');
        }

        document.addEventListener('click', function(event) {
            let sidebar = document.getElementById('sidebar');
            let toggleSidebar = document.getElementById('toggleSidebar');
            if (!sidebar.classList.contains('hidden') &&
                !sidebar.contains(event.target) &&
                !toggleSidebar.contains(event.target)) {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('flex', 'flex-col');
                overlay.classList.remove('absolute');
                overlay.classList.add('hidden');
            }
        });
    }
</script>
