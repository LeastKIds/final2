<template>
    <nav id="header" class="fixed bg-black text-white w-full z-20 top-0">
        <div id="progress" class="h-1 z-40 top-0"
             style="background:linear-gradient(to right, #FFC100 var(--scroll), transparent 0);"></div>
        <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
            <div class="block lg:hidden pl-8 p-2">
                <a class="text-yellow-300 font-bold text-base no-underline hover:no-underline" :href="route('dashboard')">
                    단어짱!
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center px-3 py-2 text-yellow-300 border-gray-600 focus:outline-none">
                    <svg fill="text-yellow-300" viewBox="0 0 20 20" class="w-6 h-6 fill-current">
                        <title>메뉴</title>
                        <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow p-4 lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-black md:bg-transparent z-20"
                 id="nav-content">
                <ul class="list-reset lg:flex justify-center flex-1 items-center">
                    <li class="mr-3" >
                        <a class="inline-block py-2 px-4 hover:text-yellow-300 font-bold"
                           :href="route('dashboard')" id="dashboard">홈</a>
                    </li>
                    <li class="mr-3" >
                        <a class="inline-block hover:text-yellow-300
                        hover:text-underline py-2 px-4" id="online" href="#">참가참가</a>
                    </li>
                    <li class="mr-3" >
                        <a class="inline-block hover:text-yellow-300 hover:text-underline
                        py-2 px-4" href="/vocabulary" id="voca_my">내 단어장</a>
                    </li>
                    <li class="mr-3" >
                        <a class="inline-block hover:text-yellow-300
                        hover:text-underline py-2 px-4" id="voca" href="/other">남 단어장</a>
                    </li>
                    <li class="mr-3" >
                        <a class="inline-block hover:text-yellow-300
                        hover:text-underline py-2 px-4" href="#" id="help">도움!</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
  name: "Layout",
  methods: {
    toggleDD(myDropMenu) {
      document.getElementById(myDropMenu).classList.toggle("invisible");
    }
  },
    mounted() {
        var h = document.documentElement,
            b = document.body,
            st = 'scrollTop',
            sh = 'scrollHeight',
            progress = document.querySelector('#progress'),
            scroll;
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");

        document.addEventListener('scroll', function () {
            scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            progress.style.setProperty('--scroll', scroll + '%');
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-black");
                navcontent.classList.remove("bg-black");
                navcontent.classList.add("bg-black");
            } else {
                header.classList.remove("bg-black");
                navcontent.classList.remove("bg-black");
                navcontent.classList.add("bg-black");

            }

        });

        document.getElementById('nav-toggle').onclick = function () {
            document.getElementById("nav-content").classList.toggle("hidden");
        }

        const t=window.location.href
        const test = t.split('/')
        console.log(test[3])
        if(test[3] === 'dashboard') {
            document.getElementById('dashboard')
                .className = 'border-b-0 md:border-b-4 border-yellow-300 ' +
                'inline-block py-2 px-4 text-yellow-300 font-bold';
            console.log(test[3])
        } else if (test[3] === 'game') {
            document.getElementById('online')
                .className ='border-b-0 md:border-b-4 border-yellow-300 text-yellow-300 ' +
                'inline-block hover:text-yellow-300 hover:text-underline py-2 px-4'
        } else if (test[3] === 'vocabulary') {
            document.getElementById('voca_my')
                .className ='border-b-0 md:border-b-4 border-yellow-300 text-yellow-300 ' +
                'inline-block hover:text-yellow-300 hover:text-underline py-2 px-4'
            console.log(test[3])
        } else if (test[3] === 'other') {
            document.getElementById('voca')
                .className ='border-b-0 md:border-b-4 border-yellow-300 text-yellow-300 ' +
                'inline-block hover:text-yellow-300 hover:text-underline py-2 px-4'
        }else if (test[3] === 'help') {
            document.getElementById('help')
                .className ='border-b-0 md:border-b-4 border-yellow-300 text-yellow-300 ' +
                'inline-block hover:text-yellow-300 hover:text-underline py-2 px-4'
        }
    }
}
</script>

<style scoped>

</style>
