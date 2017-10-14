<!DOCTYPE html>
<html>
<head>
<title>Arbitrary nested arrays converter</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
<style type="text/css">
    h1.ui.center.header {
        margin-top: 3em;
    }
</style>
</head>
<body>
<div class="ui grid">
    <div class="sixteen wide column">
        <h1 class="ui center aligned header">Arbitrary nested arrays converter</h1>
        <div class="ui center aligned segment">
            <div class="ui action left input">
                <input type="text" name="txtArray" id="txtArray" placeholder="Enter array">
                <button class="ui teal button">Convert</button>
            </div>
        </div>
    </div>
</div>

<div class="ui two column centered grid">
    <div class="column">
        <div class="ui message hidden">
            <i class="close icon"></i>
            <div class="header"></div>
            <p></p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
<script type="text/javascript">
$(function() {

    $('button').on('click', function() {
        var self = $(this);
        var param = {
            txtArray : $('#txtArray').val()
        };
        if ($.trim($('#txtArray').val()) == '') {
            return false;
        }
        self.addClass('loading');
        $.post('convert.php', param, function(data) {
            var classStatus = (data.status) ? 'positive' : 'negative';
            setTimeout(function(){
                self.removeClass('loading');
                $('.message').removeClass('hidden').removeClass('positive negative')
                    .addClass(classStatus).find('.header').html(data.header)
                        .next('p').html(data.info);
            }, 300);            
        }, 'json');
    });

    $('.message .close').on('click', function() {
        $(this).closest('.message').transition('fade');
    });

})
</script>
</body>
</html>