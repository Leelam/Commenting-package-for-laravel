<!DOCTYPE html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta id="token" name="token" value="{{ csrf_token() }}">
	<meta id="valid" name="valid" value="{{Crypt::encrypt( 'App\User'.':1' ) }}">
	<!-- Bootstrap CSS -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
	<style>
		body{
			padding: 2em 0;
			font-family: "Source Sans Pro";
		}
		.error{
			color: red;
		}
		.commentItem figure, .commentItem .data{
			float: left;
			margin: 10px 10px;
		}


		.nav-tabs {
			border-bottom: 2px solid #DDD;
		}

		.nav-tabs > li.active > a, .nav-tabs > li > a.active:focus, .nav-tabs > li > a.active:hover {
			border-width: 0;
		}

		.nav-tabs > li > a {
			border: none;
			color: #666;
		}

		.nav-tabs > li > a.active, .nav-tabs > li > a:hover {
			border: none;
			color: #4285F4 !important;
			background: transparent;
		}

		ul.nav-tabs > li > a::after {
			content: "";
			background: #ff162d;
			height: 2px;
			position: absolute;
			width: 100%;
			left: 0px;
			bottom: -1px;
			transition: all 250ms ease 0s;
			transform: scale(0);
		}

		.nav-tabs > li:hover > a::after{
			transform: scale(1);
		}

		.tab-nav > li > a::after {
			background: #21527d none repeat scroll 0% 0%;
			color: #fff;
		}

		.tab-pane {
			padding: 15px 0;
		}

		.tab-content {
			padding: 20px
		}
		.media .media img{
			width: 48px;
		}
		.commentitem{

		}
		article.commentItem{
			margin: 10px 0;
			border-bottom: 1px dashed #e1e1e1;
		}
		article.commentItem .media-body > span{
			line-height: 1.8;
			margin-left: 10px;
		}
		.staggered-transition {
			transition: all .5s ease;
			overflow: hidden;
			margin: 0;

		}
		.staggered-enter, .staggered-leave {
			opacity: 0;
			height: 0;
		}
		.item {
			cursor: pointer;
		}
		.bold {
			font-weight: bold;
		}
		ul {
			padding-left: 1em;
			line-height: 1.5em;
			list-style-type: dot;
		}
	</style>
</head>
<body>

<section id="lcsCommentsBox" class="container">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="nav-item">
						<a class="nav-link active" href="#tab-comments"
						   aria-controls="home"
						   role="tab"
						   data-toggle="tab"> @{{ totalComments }} Comments</a></li>
					<li class="nav-item"  role="presentation">
						<a class="nav-link"   href="#tab-write-comment"
						   aria-controls="profile" role="tab"
						   data-toggle="tab">Write Comment</a></li>
					<li class="nav-item pull-right" role="presentation">
						<a class="nav-link"  href="#tab-login"
						   aria-controls="messages"
						   role="tab"
						   data-toggle="tab">Login</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab-comments">
						{{--<comments :cdata="childs"></comments>--}}
					</div>
					<div role="tabpanel" class="tab-pane" id="tab-write-comment">
						<div id="addCommentBox" class="container">
							{{--{!!  Form::open( [ 'route'=> 'commentStore', ':submit' => "saveComment"] ) !!}--}}
							<form method="POST" v-on:submit.prevent="saveComment">
									<span  v-show="!canAccess">
									<label for="full_name">Full Name</label>
									<input name="author.full_name" v-model="newComment.author.full_name"
										   class="form-control" >

									<label for="email">Email <small>We never spam you, Only from krishna@leela.com</small> </label>
									<input name="author.email" v-model="newComment.author.email" class="form-control" >
									</span>
								<label for="comment">Comment
									<span class="error" v-if=" ! newComment.comment">*</span>
								</label>
								{{--{!!Form::textarea('comment', null, ['class' => 'form-control', 'id'=>'comment', 'rows'=>'3', 'v-model' => "newComment.comment"])!!}--}}
								<textarea name="comment" id="comment" cols="30" rows="10" v-model="newComment.comment" class="form-control"></textarea>

								<br>
								{{--{!! Form::submit('comment',['class'=>'btn btn-default', ":disabled"=>"errors"]) !!}--}}
								<button :disabled="errors" class="btn btn-default">Comment</button>
							</form>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="tab-login">
						Hello
					</div>
				</div>
			</div>
		</div>

	</div>

	<comments :cdata="childs"></comments> {{-- Child dat--}}

	<pre>
	{{--@{{ $data| json }}--}}
</pre>
</section>{{-- App section closed--}}


<!-- item template

just as you said.. it may be storing like this.. data.cdata.{values}. Bevause see


I am for eaching

-->
<template id="comments-template">
	<div class="media commentitem" v-for="mainData in cdata">
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="http://placehold.it/64x64" alt="Generic placeholder image">
			</a>
		</div>

		<div class="media-body">
		<h4 class="media-heading pull-left">@{{ mainData.author.full_name }}</h4>
		<div class="pull-right">
			<counter
					:start="mainData.up"
					:via="mainData.id"
					:type="'up'"
			></counter>
			<counter
					:start="mainData.down"
					:via="mainData.id"
					:type="'down'"
			>
			</counter>
		</div>
		<div class="clearfix"></div>
		@{{ mainData.comment }}
		<hr>
		<div v-show="open" v-if="isFolder">
			<comments
					:cdata="mainData.childs">
			</comments>
		</div>
	</div>

</template>

<template id='counter-template'>
	<button @click="count += 1" v-on:click="vote(counterdata = count, via, type)"> @{{ count }}</button>
</template>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.10/vue.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.17/vue-resource.js"></script>
<script type="text/javascript">
	Vue.config.debug = true;
	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	Vue.transition('stagger', {
		stagger: function (index) {
			return Math.min(1, index * 1)
		}
	});

	var Counter = Vue.component('counter', {
		template: '#counter-template',
		props:['start', 'via', 'type'],
		data:function(){
			return {count:this.start+0}
		},
		methods:{
			vote:function(count,via,type){
				var resource = this.$resource('/comments/put/vote/:id/:one/:two/:three');

				setTimeout(function() {
					resource.update({id: via, one:count, two: type}, {}, function (data, status, request) {

						// this.count += 1;
					}).error(function (data, status, request) {
					//	alert( 'false returned' + data + status)
					})
				}.bind(this),1000);

			}
		}
	});
	// Se.. we are storing data object as "childs" and modifying it on the compenent, but we can not directly apply it as
	// a attribute so we convert it as property.


	//COMMENTER this will create a customer Component/element with that ID.

	var Commenter = Vue.component('comments', {
		template: '#comments-template',
		props:['cdata'],
		data: function () {
			return {
				open: true,
				indexer:0,
				totalComments:1552
			}
		},
		computed: {
			isFolder: function () {
				//console.log(this.indexer);
				return  true ;//this.cdata[0].childs && (this.cdata[0].childs.length ); // returning
				// fine
				// but. this
				// .child && this
				// .length
				// may
				// notworking
				// properly.
				// ? Evry comment has Childs. is that problem ?donno.
			}
		},
		methods: {
			toggle: function () {
				if (this.isFolder) {
					this.open = !this.open
				}
			},
			changeType: function () {
				if (!this.isFolder) {
					Vue.set(this.cdata, 'childs', []);
					this.addChild();
					this.open = true
				}
			}

		}

	});

	var vm = new Vue({
		el: '#lcsCommentsBox',

		data:{ // shoudn't that be  ="data.childs"? no actully . got it. yaa. they
			//	count:0,

			childs:[], // we only need this part to export tho that component/ Only DATA Object.yes. This is also
			// a work fine though
			newComment:{
				author:{
					full_name:'krishna',
					email:'krishna@leela.com'
				},
				comment:'Default Commen ss t',
				valid:document.querySelector('#valid').getAttribute('value')

			},

			canAccess:false
		},
		computed: {
			errors: function() {
				for (var key in this.newComment) {
					if ( ! this.newComment[key]) return true;
				}

				return false;
			},
			totalComments: function () {
				// record length
				//return this.childs.length;
				return this.childs.length; // TODO :: UPDATE Child Comments Count
				// return it intact
				//	return filteredLength
			}

		},
		ready: function () {
			//setTimeout(function() {
				this.fetchComments();
		//	}.bind(this),1000)

		},
		methods: {
			fetchComments: function () {
				var resource = this.$resource('/api/users/:id/:one/:two/:three');

				resource.get({ id:1 }).success(function (dataFromServer) {
					this.$set('childs', dataFromServer); // this part is main
				}).error(function (error) {
					console.log(error);
				});
			},

			saveComment: function () {

				var message = this.newComment;
				this.childs.push(message);
				this.newComment = { author:{"full_name":'', email:''}, comment: '' };
				this.$http.post('/comments/store', message);
			}

		}

	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
</body>
</html>