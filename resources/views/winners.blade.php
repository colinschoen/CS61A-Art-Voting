@include('core.header')
<!-- Voting -->
<section id="voting" class="main special">
    <div class="container">
        <div class="content">
            <header class="major">
                <h2>Winners</h2>
            </header>
            <p>The winners of the Fall 2015 Scheme Art Contest.
                These entries exemplify the principles of <strong>elegance</strong>, <strong>beauty</strong>, and <strong>abstraction</strong> that are
                prized in the Berkeley computer science curriculum.
            </p>
        </div>
        <a href="#sectionInfo" class="goto-next scrolly">Next</a>
    </div>
</section>

<section id="sectionInfo" class="main special">
    <div class="container">
        <div class="content">
            <header class="major">
                <h2>Feather Weight <small>Winners</small></h2>
            </header>
            <p>Eligible entries contained at most <strong>256</strong> tokens of Scheme, not including comments or delimiters.</p>
        </div>
    </div>
</section>

<?php $i = 0; ?>

@foreach ($featherResults as $feather)
<section id="a{{{ $i }}}" class="main special">
    <div class="container">
        <div class="content">
            <header class="major">
                <h3><span style="color: #ff2f2e;">@if ($i == 0) 1st Place: @elseif ($i == 1) 2nd Place: @elseif ($i == 2) 3rd Place: @endif</span>{{{ $feather->title }}}</h3>
                <h5>by {{{ $feather->name }}}</h5>
            </header>
            <img class="lazy" style="max-width:100%;" data-src="/artwork/{{{ $feather->image }}}">
            <br />
            <pre>{{{ $feather->body }}}</pre>
            <strong>Votes: {{{ $feather->total }}}</strong>
            <br />
            <a style="border-bottom: none;" href="#modal-id-{{{ $feather->id }}}"><button class="button">View Code</button></a>
            <div class="remodal" data-remodal-id="modal-id-{{{ $feather->id }}}">
            <button data-remodal-action="close" class="remodal-close"></button>
            <h1>{{{ $feather->title }}}</h1>
                <strong>Tokens: {{{ $feather->tokens }}}</strong>
                <div style="overflow-x: scroll; text-align: left;" class="well"><pre>{!! $feather->code !!}</pre></div>
            </div>

        </div>
        <a href="#a{{{ $i + 1 }}}" class="goto-next scrolly">Next</a>
    </div>
</section>
<?php $i += 1 ?>
@endforeach


<section id="sectionHeavyInfo" class="main special">
    <div class="container">
        <div class="content">
            <header class="major">
                <h2>Heavy Weight Winners</h2>
            </header>
            <p>Eligible entries contained at most <strong>2048</strong> tokens of Scheme, not including comments or delimiters.</p>
            @if (count($heavyResults) == 0)
                <br />
                <p><strong>No entries :(</strong></p>
            @endif
        </div>
    </div>
</section>

<?php $i = 0; ?>
@foreach ($heavyResults as $heavy)
    <section id="b{{{$i}}}" class="main special">
        <div class="container">
            <div class="content">
                <header class="major">
                    <h3><span style="color: #ff2f2e;">@if ($i == 0) 1st Place: @elseif ($i == 1) 2nd Place: @elseif ($i == 2) 3rd Place: @endif</span>{{{ $heavy->title }}}</h3>
                    <h5>by {{{ $heavy->name }}}</h5>
                </header>
                <img class="lazy" style="max-width:100%;" data-src="/artwork/{{{ $heavy->image }}}">
                <br />
                <pre>{{{ $heavy->body }}}</pre>
                <strong>Votes: {{{ $heavy->total }}}</strong>
                <br />
                <a style="border-bottom: none;" href="#modal-id-{{{ $heavy->id }}}"><button class="button">View Code</button></a>
                <div class="remodal" data-remodal-id="modal-id-{{{ $heavy->id }}}">
                    <button data-remodal-action="close" class="remodal-close"></button>
                    <h1>{{{ $heavy->title }}}</h1>
                    <strong>Tokens: {{{ $heavy->tokens }}}</strong>
                    <div style="overflow-x: scroll; text-align: left;" class="well"><pre>{!! $heavy->code !!}</pre></div>
                </div>
            </div>
            <a href="#b{{{ $i + 1  }}}" class="goto-next scrolly">Next</a>
        </div>
    </section>
<?php $i += 1; ?>
@endforeach
@include('core.footer')
