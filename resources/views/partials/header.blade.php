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
                                <h1>{{ $couple->user1->name }} &amp; {{ $couple->user2->name }}</h1>
                                <h2>You're getting married!</h2>
                            @else
                                <h1>No couple information found</h1>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
