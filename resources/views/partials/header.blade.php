<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
                            @php
                                Auth::user()->couplesAsUser1->count() > 0 ? $couple = Auth::user()->couplesAsUser1->first() : $couple = Auth::user()->couplesAsUser2->first();
                            @endphp

                            @if ($couple)
                                <h2>Here's your wedding partner!</h2>
                                <h1>@if(Auth::user()->gender == 'Male') {{ $couple->user2->name }} @else {{ $couple->user1->name }} @endif</h1>
                                <img class="mb-2" src="{{ asset($couple->user1->profile_image) }}" style="border-radius: 50%">
                            @else
                                <h1>No couple information found</h1>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
