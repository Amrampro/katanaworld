@extends("template")

@section("content")
<section class="ftco-section ftco-section-2">
        <div class="container">
            <ul class="nav nav-tabs flex-grow justify-content-around nav-pills" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{$tab==1?'active':''}} " id="all-tab" data-toggle="tab" data-target="#pass" type="button" role="tab" aria-controls="all" aria-selected="true">{{__('pass events')}}</button>
                  </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{$tab==2?'active':''}}" id="active-tab" data-toggle="tab" data-target="#active" type="button" role="tab" aria-controls="active" aria-selected="false">{{__('event a venir')}}</button>
                  </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link {{$tab==3?'active':''}}" id="all-tab" data-toggle="tab" data-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">Tous</button>
                </li>
                
                
              </ul>
              <div class="tab-content" id="myTabContent">
                {{-- tab pane for active --}}
                <div class="tab-pane fade {{$tab==2?'show active':''}}" id="active" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        @foreach ($activeEvents  as $event)
                            <x-event-element :lieu="$event->lieu" :link="route('events.show',['event'=>$event->id])" :date="$event->start_at" :poster="asset($event->poster_url)" :titre="$event->titre"  >
                                {{$event->description}}
                            </x-event-element>
                        @endforeach
        
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    {{ $activeEvents->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- tab pane for pass --}}
                <div class="tab-pane fade {{$tab==1?'show active':''}}" id="pass" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @forelse ($passEvents  as $event)
                            <x-event-element :lieu="$event->lieu" :link="route('events.show',['event'=>$event->id])" :date="$event->start_at" :poster="asset($event->poster_url)" :titre="$event->titre"  >
                                {{$event->description}}
                            </x-event-element>
                            @empty
                            <div class="laert alert-warning"><i class="fa fa-bell"></i> {{__('no pass event')}}</div>
                        @endforelse
                    </div>
                    @if($passEvents->count()>0)
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    {{ $passEvents->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                {{-- tab pane for all --}}
                <div class="tab-pane fade {{$tab==3?'show active':''}} " id="all" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @foreach ($allEvents  as $event)
                            <x-event-element :lieu="$event->lieu" :link="route('events.show',['event'=>$event->id])" :date="$event->start_at" :poster="asset($event->poster_url)" :titre="$event->titre"  >
                                {{$event->description}}
                            </x-event-element>
                        @endforeach
        
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    {{ $allEvents->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
               
              </div>
            
        </div>
    </section>
@endsection

@section("home-section")
    @include("_partials.home-section",['hs_url' => 'events','hs_name' => __("Page d'evenement")])
@endsection
