function countdownBXR(target_date, countdown) {    
    this.target_date = target_date;
    this.countdown = countdown;
    this.days;
    this.hours;
    this.minutes;
    this.seconds;
    this.current_date;
    this.seconds_left;
    this.Interval;
}

countdownBXR.prototype.getCountdown = function() {    
    this.current_date = parseInt(new Date().getTime()/1000);
    this.seconds_left = this.target_date - this.current_date;

    this.days = this.pad( parseInt(this.seconds_left / 86400) );
    if (this.days > 99 || this.seconds_left < 0) {
        $(this.countdown).closest('.bxr-countdown').hide();
        $('.bxr-current-price').html($('.bxr-old-price span').html());
        $('.bxr-old-price').remove();
        clearInterval(this.Interval);
        return;
    }
    this.seconds_left = this.seconds_left % 86400;

    this.hours = this.pad( parseInt(this.seconds_left / 3600) );
    this.seconds_left = this.seconds_left % 3600;

    this.minutes = this.pad( parseInt(this.seconds_left / 60) );
    this.seconds = this.pad( parseInt(this.seconds_left % 60 ) );

    this.countdown.innerHTML = "<span>" + this.days + "</span><span>" + this.hours + "</span><span>" + this.minutes + "</span><span>" + this.seconds + "</span>"; 
    $(this.countdown).closest('.bxr-countdown').show();
};
    
countdownBXR.prototype.pad = function(n){
    return (n < 10 ? '0' : '') + n;
};   

countdownBXR.prototype.start = function(){
//    console.log(parseInt(new Date().getTime()/1000));
//    console.log(this.target_date);
//    var somedatetime = new Date();
//    somedatetime.setTime(this.target_date*1000);
//    console.log(somedatetime);
    var self = this;    
    this.Interval = setInterval(function () {self.getCountdown(); }, 1000);
}; 