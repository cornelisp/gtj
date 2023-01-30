@props(['Announcement'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$Announcement->logo ? asset('storage/' . $Announcement->logo) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/announcements/{{$Announcement->id}}">{{$Announcement->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$Announcement->company}}</div>
      <x-Announcement-tags :tagsCsv="$Announcement->tags" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$Announcement->location}}
      </div>
    </div>
  </div>
</x-card>