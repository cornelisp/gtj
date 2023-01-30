<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Wróć
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6"
          src="{{$Announcement->logo ? asset('storage/' . $Announcement->logo) : asset('/images/no-image.png')}}" alt="" />

        <h3 class="text-2xl mb-2">
          {{$Announcement->title}}
        </h3>
        <div class="text-xl font-bold mb-4">{{$Announcement->company}}</div>
        <x-Announcement-tags :tagsCsv="$Announcement->tags" />
        <div class="text-lg my-4">
          <i class="fa-solid fa-location-dot"></i> {{$Announcement->location}}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
          <h3 class="text-3xl font-bold mb-4">Opis pracownika</h3>
          <div class="text-lg space-y-6">
            {{$Announcement->description}}

            <a href="mailto:{{$Announcement->email}}"
              class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                class="fa-solid fa-envelope"></i>
              Skontaktuj się</a>

            <a href="{{$Announcement->website}}" target="_blank"
              class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-globe"></i>
              Sprawdź portfolio</a>
          </div>
        </div>
      </div>
    </x-card>
  </div>
</x-layout>