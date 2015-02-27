define(['text!templates/track.html', 'text!templates/events.html'],function(tpl, eventsTpl){
    var TrackView = Backbone.View.extend({
        template: _.template(tpl),
        eventsTpl: _.template(eventsTpl),
        events: {
            'click .button-goal': 'goal'
        },
        players: null,
        game: null,
        initialize: function(){
            this.players = window.kickerTrack.players;
            this.game = window.kickerTrack.game;
            // Инициализируем модели
            this.goals = new Backbone.Collection();
            var that = this;
            $.each(window.kickerTrack.goals, function(index, value){
                that.goals.add(new Backbone.Model(value));
            });
            this.goals.on('add', this.render, this);
            this.goals.on('change', this.render, this);
        },
        render: function(){
            this.$el.html(this.template({
                players: this.players,
                goals: this.goals,
                eventsTpl: this.eventsTpl
            }));
            return this;
        },
        goal: function(e){
            var el = $(e.currentTarget);
            var that = this;
            // Добавляем гол
            var userId = parseInt(el.attr('user-id'));
            var goal = that.goals.add(new Backbone.Model({user_id: userId, created: 'send...'}));
            $.ajax('/index.php/game/goal', {
                method: 'post',
                data: {
                    id:       this.game.id,
                    user:     userId,
                    autogoal: el.is('.autogoal') ? 1 : 0
                },
                success: function(reply){
                    goal.set(reply);
                }
            });
        }
    });
    return TrackView;
});