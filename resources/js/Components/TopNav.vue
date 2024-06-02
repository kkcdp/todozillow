<template>
    <div class="py-6 w-full flex items-center justify-between">
        <div class="flex flex-row items-center max-[1050px]:hidden">
            <div class="main-link group">
                <Link :href="route('home')">Home</Link>
                <div class="links-underline"></div>
            </div>

            <div v-if="!user" class="main-link group">
                <Link :href="route('about')">About</Link>
                <div class="links-underline"></div>
            </div>

            <div class="main-link group">
                <Link :href="route('resources')">Resources</Link>
                <div class="links-underline"></div>
            </div>

            <div class="main-link group">
                <Link :href="route('blog')">Blog</Link>
                <div class="links-underline"></div>
            </div>

            <div v-if="user" class="main-link group">
                <Link :href="route('groups.index')">Todo groups</Link>
                <div class="links-underline"></div>
            </div>

            <div v-if="user" class="main-link group">
                <Link :href="route('showalltodos')">All todos</Link>
                <div class="links-underline"></div>
            </div>
        </div>

        <div class="flex flex-row items-center">
          <div class="nav">
            <button id="btn_toggle_menu" class="btn-nav cursor-pointer min-[1051px]:hidden">
                <span class="icon-bar top"></span>
                <span class="icon-bar middle"></span>
                <span class="icon-bar bottom"></span>
            </button>
          </div>

            <div class="nav-content hideNav hidden min-[1051px]:hidden">
              <ul class="nav-list">
                <li class="nav-item">
                    <Link class="item-anchor" :href="route('home')">Home</Link>
                </li>
                <li class="nav-item">
                    <Link class="item-anchor" :href="route('about')">About</Link>
                </li>
                <li class="nav-item">
                    <Link class="item-anchor" :href="route('resources')">Resources</Link>
                </li>
              </ul>
            </div>
        </div>



        <div class="flex flex-row items-center pr-4">
            <div v-if="user" class="text-lg p-3 pb-4">
                <div>Hi, {{ user.name }}!</div>
            </div>
            <div v-else class="group">
                <Link class="text-lg" :href="route('login')">Login</Link>
                <div class="links-underline"></div>
                <!-- &nbsp
                <Link :href="route('user-account.create')">Register</Link> -->
            </div>

            <div v-if="user" class="group">
                <Link class="text-lg" :href="route('logout')" method="DELETE" as="button">Logout</Link>
                <div class="links-underline"></div>
            </div>

        </div>

    </div>
</template>
<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const user = computed(
    ()=>page.props.user
)

</script>

<script>
    export default {
        mounted: function() {
          var flag = false;
          $('#btn_toggle_menu').on("click",function () {
            if (flag) {
              $(".nav-content").toggleClass("showNav hideNav");
              $("#btn_toggle_menu").toggleClass("animated");
              $('.nav-content').delay(800).queue(function(){
                    $(this).addClass('hidden').clearQueue();
                });
                flag = false;
            } else {
              $(".nav-content").toggleClass("showNav hideNav").removeClass('hidden');
              $("#btn_toggle_menu").toggleClass("animated");
                flag = true;
    }
});
            $(".item-anchor ").on("click", function(){
                $(".nav-content").toggleClass("hideNav showNav");
                $("#btn_toggle_menu").toggleClass("animated");
                $('.nav-content').delay(800).queue(function(){
                    $(this).addClass('hidden').clearQueue();
                });
                flag = false;
            })

            $(".main-link").on("click", function(){
                $('.main-link').removeClass('selected');
                $(this).addClass('selected');
            })
    }
  }
</script>

<style>

.selected {
    color:#F9B339;
    font-weight: bold;
    /* text-decoration: underline;
    text-underline-offset: 8px;
    text-decoration-thickness: 3px; */
}

.nav {
  position: absolute;
  width: auto;
  display: inline-block;
  border: none;
}

.btn-nav {
  position: fixed;
  top: 20px;
  left: 30px;
  background: transparent;
  border: none;
  padding: 10px;
  cursor: pointer;
  z-index: 99999;
}

.btn-nav:focus {
  outline: 0;
}

.icon-bar {
  display: block;
  margin: 6px 0;
  width: 35px;
  height: 5px;
  background-color: white;
}

.btn-nav:hover .icon-bar {
  background-color: #F9B339;
}

.nav-content {
  position: fixed;
  top: 105px;
  width: 100%;
  min-height: 70vh;
  background-color: rgb(117, 148, 185);
  /* backdrop-filter: blur(10px); */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
}

/* .nav-list {
  list-style: none;
  padding: 0;
  position: relative;

} */

.item-anchor:after {
  content: "";
  position: absolute;
  width: 3px;
  height: 3px;
  left: 0;
  bottom: 0;
  z-index: 9;
  background: transparent;
}

.item-anchor {
  color: #fff;
  font-size: 30px;
  text-transform: uppercase;
  position: relative;
  text-decoration: none;
  padding: 10px;
  letter-spacing: 15px;
}

.item-anchor:hover,
.item-anchor:focus {
  color: #F9B339;

}

.item-anchor:hover:after,
.item-anchor:focus:after{
  width: 100%;
  background: #F9B339;
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -ms-transition: all 1s ease;
  -o-transition: all 1s ease;
  transition: all 1s ease;
}

.nav-item {
  margin: 40px auto;
  text-align: center;
}

.animated {
  display: block;
  margin: 0 auto;
}

.animated:hover .icon-bar,
.animated:focus .icon-bar{
  background-color: #FCA311;
}

.animated:focus {
  cursor: pointer;
  z-index: 9999;
}

.middle {
  margin: 0 auto;
}

.icon-bar {
  -webkit-transition: all .7s ease;
  -moz-transition: all .7s ease;
  -ms-transition: all .7s ease;
  -o-transition: all .7s ease;
  transition: all .7s ease;
  z-index: 999999;
}

.animated .icon-bar {
  z-index: 999999;
  background-color: #FCA311;
}

.animated .top {
  -webkit-transform: translateY(10px) rotateZ(45deg);
  -moz-transform: translateY(10px) rotateZ(45deg);
  -ms-transform: translateY(10px) rotateZ(45deg);
  -o-transform: translateY(10px) rotateZ(45deg);
  transform: translateY(10px) rotateZ(45deg);
}

.animated .bottom {
  -webkit-transform: translateY(-11px) rotateZ(-45deg);
  -moz-transform: translateY(-11px) rotateZ(-45deg);
  -ms-transform: translateY(-11px) rotateZ(-45deg);
  -o-transform: translateY(-11px) rotateZ(-45deg);
  transform: translateY(-11px) rotateZ(-45deg);
}

.animated .middle {
  width: 0;
}

@keyframes showNav {
  from {
    left: -100%;
  }
  to {
    left: 0;
  }
}

@-webkit-keyframes showNav {
  from {
    left: -100%;
  }
  to {
    left: 0;
  }
}

@-moz-keyframes showNav {
    from {
    left: -100%;
  }
  to {
    left: 0;
  }
}

@-o-keyframes showNav {
    from {
    left: -100%;
  }
  to {
    left: 0;
  }
}

.showNav {
  -webkit-animation: showNav 1s ease forwards;
  -moz-animation: showNav 1s ease forwards;
  -o-animation: showNav 1s ease forwards;
  animation: showNav 1s ease forwards;
}

@keyframes hideNav {
  from {
    left: 0;
  }
  to {
    left: -100%;
  }
}

@-webkit-keyframes hideNav {
  from {
    left: 0;
  }
  to {
    left: -100%;
  }
}

@-moz-keyframes hideNav {
  from {
    left: 0;
  }
  to {
    left: -100%;
  }
}

@-o-keyframes hideNav {
  from {
    left: 0;
  }
  to {
    left: -100%;
  }
}

.hideNav {
  -webkit-animation: hideNav 1s ease forwards;
  -moz-animation: hideNav 1s ease forwards;
  -o-animation: hideNav 1s ease forwards;
  animation: hideNav 1s ease forwards;
}

.hidden {
  display: none;
}

</style>
