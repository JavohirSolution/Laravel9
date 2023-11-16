<x-layouts.app>
    <x-slot:title>
        Xabarnomalar
    </x-slot:title>
    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3"> Oxirgi Xabarnomalar</h1>
                </div>
            </div>
            @foreach ($notifications as $notification)
                @if ($notification->read_at == null)
                    <div class="border p-3 mb-5">
                        <div class="position-relative mb-4">

                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">New</h4>
                            </div>

                        </div>
                        <div class="d-flex mb-2">
                            <a
                                class="text-secondary text-uppercase font-weight-medium">{{ $notification->data['created_at'] }}</a>
                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $notification->data['title'] }}</h5>
                        <p class="mb-4">{{ 'yangi post yaratildi. id: ' . $notification->data['id'] }}</p>
                        <a class="btn btn-sm btn-primary py-2"
                            href="{{ route('notification.read', ['notitfication' => $notification->id]) }}">O'qildi</a>
                    </div>
                @else
                @endif
            @endforeach
            {{ $notifications->links() }}
        </div>
    </div>
    <!-- Blog End -->
</x-layouts.app>
