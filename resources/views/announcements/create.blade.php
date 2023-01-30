<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Stwórz ogłoszenie</h2>
      <p class="mb-4">Dodaj ogłoszenie i zareklamuj się pracodawcom</p>
    </header>

    <form method="POST" action="/announcements" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Imię i Nazwisko / Nazwa Firmy</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
          value="{{old('company')}}" />

        @error('company')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Stanowisko</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Przykład: Programista PHP" value="{{old('title')}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="location" class="inline-block text-lg mb-2">Lokalizacja</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
          placeholder="Przykład: Zdalnie, Warszawa" value="{{old('location')}}" />

        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">
          Email Kontaktowy
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2">
          Strona Internetowa / Portfolio
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
          value="{{old('website')}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tagi (Oddzielić Przecinkiem)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Przykład: PHP, Laravel, MySQL" value="{{old('tags')}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
           Zdjęcie / Logo
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Informacje Dodatkowe
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Np. Lata doświadczenia, oczekiwania finansowe itp.">{{old('description')}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Stwórz ogłoszenie
        </button>

        <a href="/" class="text-black ml-4"> Cofnij </a>
      </div>
    </form>
  </x-card>
</x-layout>
