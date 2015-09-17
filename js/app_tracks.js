var player, title, q, nItem, nRes, gTrack, nTrack;
$(document).ready(function() {
    gTrack = $("#gTrack"), nTrack = $("#nTrack"), gTrack.on("click", function() {
        q = nTrack.val(), nItem = $("._items .itemSong").length, nRes = 200, "" == q ? $('._items').html('') && $(".pagination").jPages("destroy") : getTrack(q, nRes), nItem == nRes ? $("._items").html("") : !1
    }), nTrack.enterKey(function() {
        gTrack.trigger("click")
    })
});
var getTrack = function(e, a) {

    var n, t = "https://api.soundcloud.com/tracks?q=" + e + "&limit=" + a,
        c = $("._items"),
        r = "",
        i = "ae1c0d2a28b3eae3bd0d11eb9e1704a4";
    player = document.getElementById("player");
    $(document).ajaxSend(function(e, a, n) {
        $("._items").html('<div class="loader"><div id="preload"><ul><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul></div></div>')
    }), $.when($.ajax(t)).then(function(e) {
        $.each(e, function(e, a) {
            if (void 0 != a) {
                var t = "img/sc_cover.svg",
                    c = a.artwork_url || t;
                n = a.title, r += '<div class="itemSong"><a href="' + a.stream_url + "?consumer_key=" + i + '" class="playItem" ><img src="' + c + '" alt="" class="coverTrack" /><span class="titleTrack">' + n + '</span><span class="current"></span></a></div>'
            }
        }), c.html(r), $(".pagination").jPages({
            containerID: "wrapSongs",
            perPage: 10,
            keyBrowse: !0,
            previous: "Anterior",
            next: "Siguiente",
            animation: "fadeInUp",
            callback: function() {
                console.log("creado")
            }
        }), $(".playItem").length > 0 && $(".playItem").on("click", function(e) {
            e.preventDefault();
            $(".playItem").removeClass('_playing'), 
            $(this).addClass('_playing'),
            playAudio(player,$(this))
        }),
        player.addEventListener("ended",function() {
            var playedItem; 
            $("._playing").addClass('_played'),
            playedItem = $('._played'),
            getNexTrack(playedItem)
        }),                    
        player.addEventListener("timeupdate",function() {
            var ct = player.currentTime;
            $(".playItem").find('.current').text('');
            $("._playing").find('.current').text(formatTime(ct));
        }) 
        player.addEventListener("loadedmetadata",function() {
            var dt = player.duration;
            $('.duration').text(formatTime(dt));
        })      


    })
   
};

var playAudio = function(refer,el){
    refer.src = el.attr("href"), 
    refer.load(),
    refer.play()
}
var getNexTrack = function(itemPlayed){
   var tEnded = itemPlayed;
   var _tnx = tEnded.closest('.itemSong').next().find('.playItem').eq(0);
   $(".playItem").removeClass('_playing');
   $(_tnx).addClass('_playing');
   playAudio(player,_tnx);
   tEnded.removeClass('_played')
}

$.fn.enterKey = function(e) {
    return this.each(function() {
        $(this).keyup(function(a) {
            var n = a.keyCode ? a.keyCode : a.which;
            "13" == n && e.call(this, a)
        })
    })
};

var formatTime = function(s){
    sec = Math.floor( s );    
    min = Math.floor( sec / 60 );
    min = min >= 10 ? min : '0' + min;    
    sec = Math.floor( sec % 60 );
    sec = sec >= 10 ? sec : '0' + sec;    
    return min + ':' + sec;
}
