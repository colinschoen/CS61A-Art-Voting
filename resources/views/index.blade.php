@include('core.header')
<!-- Voting -->
<section id="voting" class="main special">
    <div class="container">
        <span class="image fit primary"><img src="images/bg.jpg" alt="" /></span>
        <div class="content">
            <header class="major">
                <h2>Voting</h2>
            </header>
            <p>Please vote for your favorite entry in this semester's 61A Recursion Exposition contest.
                The winner should exemplify the principles of <strong>elegance</strong>, <strong>beauty</strong>, and <strong>abstraction</strong> that are
                prized in the Berkeley computer science curriculum. As an academic community, we should strive
                to recognize and reward merit and achievement.<br /><br />
                <span style="font-style: italic;"><a href="#footer" class="scrolly">(Voting form is located after all images)</a></span>
            </p>
        </div>
        <a href="#sectionInfo" class="goto-next scrolly">Next</a>
    </div>
</section>

<section id="sectionInfo" class="main special">
    <div class="container">
        <span class="image fit primary"><img src="images/bg.jpg" alt="" /></span>
        <div class="content">
            <header class="major">
                <h2>Feather Weight</h2>
            </header>
            <p>Eligible entries contain at most <strong>256</strong> tokens of Scheme, not including comments or delimiters.</p>
            @if (count($heavies) == 0)
                <br />
                <p><strong>No entries :(</strong></p>
            @endif
        </div>
    </div>
</section>

<?php $i = 0; ?>

@foreach ($feathers as $feather)
<section id="a{{{ $i }}}" class="main special">
    <div class="container">
        <div class="content">
            <header class="major">
                <h3>{{{ $feather->title }}}</h3>
            </header>
            <img style="max-width:100%;" src="/artwork/{{{ $feather->image }}}">
            <br />
            <pre>{{{ $feather->body }}}</pre>
            <div class="radio">
                <label>
                    <input type="radio" name="inputFeather" value="{{{ $feather->id }}}" /> <i class="fa fa-hand-o-up fa-fw"></i> Feather Weight Vote
                </label>
            </div>

        </div>
        <a href="#a{{{ $i + 1 }}}" class="goto-next scrolly">Next</a>
    </div>
</section>
<?php $i += 1 ?>
@endforeach


<section id="sectionHeavyInfo" class="main special">
    <div class="container">
        <span class="image fit primary"><img src="images/bg.jpg" alt="" /></span>
        <div class="content">
            <header class="major">
                <h2>Heavy Weight</h2>
            </header>
            <p>Eligible entries contain at most <strong>2048</strong> tokens of Scheme, not including comments or delimiters.</p>
            @if (count($heavies) == 0)
                <br />
                <p><strong>No entries :(</strong></p>
            @endif
        </div>
    </div>
</section>

<?php $i = 0; ?>
@foreach ($heavies as $heavy)
    <section id="a{{{$i}}}" class="main special">
        <div class="container">
            <div class="content">
                <header class="major">
                    <h3>{{{ $heavy->title }}}</h3>
                </header>
                <img style="max-width:100%;" src="/artwork/{{{ $heavy->image }}}">
                <br />
                <pre>{{{ $heavy->body }}}</pre>
                <div class="radio">
                    <label>
                        <input type="radio" name="inputHeavy" value="{{{ $heavy->id }}}" /> <i class="fa fa-hand-o-up fa-fw"></i> Heavy Weight Vote
                    </label>
                </div>
            </div>
            <a href="#a{{{ $i + 1  }}}" class="goto-next scrolly">Next</a>
        </div>
    </section>
<?php $i += 1; ?>
@endforeach
@include('core.footer')
