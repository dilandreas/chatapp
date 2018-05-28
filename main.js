Pusher.logToConsole = true;
var pusher = new Pusher('cabcc969c12fd8e852cd',{
	cluster		: 'ap1',
	encrypted	: true	
})
var chanel  = pusher.subscribe('chat-chanel');

var vi = new Vue({
	el	: '#app',
	data:{
		chats	: [],
		username: '',
		chatInput: ''
	},
	methods:{
		sendMessage(e){
			if(e.keyCode===13){
				console.log(e)
				e.preventDefault()
				if(this.chatInput == ''|| this.chatInput.trim() == ' ')
					return
				var date  = new date();
				axios.post('http://localhost/chatapp/chat/index.php?method=sendMessage',{
					username	: this.username,
					message 	: this.chatInput,
					time 		: date.toLocaleString()
				}).then(data=>{
					console.log(data)
				})
			}
		}
	}
});

channel.bind('chat-event', function(data){
	console.log(data);
});
