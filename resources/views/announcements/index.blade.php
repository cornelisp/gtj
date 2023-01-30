<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif

  @include('partials._search')

  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($announcements) == 0)

    @foreach($announcements as $Announcement)
    <x-Announcement-card :Announcement="$Announcement" />
    @endforeach

    @else
    <p>Nie znaleziono ogłoszeń</p>
    @endunless

  </div>

  <div class="mt-6 p-4">
    {{$announcements->links()}}
  </div>
</x-layout>
