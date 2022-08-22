<template>
    <div class="banner">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div :class="updateClass">{{ text }} </div>
				<span class="subtext">{{ stext }} </span>
			</div>
			<div class="col-sm-12 col-md-6">
				
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Header",
	data() {
		return {
			text: "Bookworms",
			stext: "find great books here",
			interval: null,
		};
	},
	methods: {
		changeText() {
			this.interval = setInterval(() => {
				const texts = ['Bookworms', 'Authors', 'Narrators', 'Writers'];
				const currentTextIndex = texts.indexOf(this.text);
				const nextTextIndex = (currentTextIndex + 1) % 4;
				const nextText = texts[nextTextIndex];
				this.text = nextText;
		}, 3000);
			this.interval = setInterval(() => {
				const stexts = ["find great books here", "advertise your books here for 'free'", "upload audio previews", "get published in our next anthology"];
				const currentStextIndex = stexts.indexOf(this.stext);
				const nextStextIndex = (currentStextIndex + 1) % 4;
				const nextStext = stexts[nextStextIndex];
				this.stext = nextStext;
			}, 3000);
		},
	},
	computed: {
		updateClass(){
			return {
				a: this.text === "Bookworms",
				b: this.text === "Authors",
				c: this.text === "Narrators",
				d: this.text === "Writers",
			};
		},
	},
	created() {
		this.changeText();
	},
	beforeUnmount(){
		clearInterval(this.interval);
	},
};
</script>

<style scoped>
	.banner {
		margin: -22px 0px 0px 0px;
		width: 100%;
		background-color: #ddd;
		border-bottom: 2px solid #333;	
	}
	.a, .b, .c, .d { 
		font-size: 10vw;
		font-weight: 900;
		margin-left: 10%;
	}
	.a {
		color: #1b95cd;
	}
	.b {
		color: #db972c;
	}
	.c {
		color: #3f60b5;
	}
	.d {
		color: #17bf4e;
	}
	.subtext {
		color: #000;
		font-size: 20px;
		font-weight: 400;
		margin: -50px 0px 0px 10%;
	}
</style>