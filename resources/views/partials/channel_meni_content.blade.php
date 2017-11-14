<style type="text/css">
    @media only screen and (max-width: 1500px) {
    #kvadrat{
        min-height: 200px;
    }
}
</style>
@foreach($streams as $theStream)

    <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
            <a  href="/game{{ $theStream->id }}"><img src="pics/game{{ $theStream->id }}.png" style="width:100%; height:100%"></a>
    </div><br>

@endforeach

<div id="kvadrat" style="margin: 0 auto; width: 100%; max-width: 800px; height: 160px;">
        <a  href="#game4"><img src="pics/coming.png" style="width:100%; height:100%"></a>
</div>