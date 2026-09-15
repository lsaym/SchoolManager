@include('components.layout')

<body class="bg-base-200/60 font-sans text-base-content antialiased">
   <div class="drawer lg:drawer-open min-h-screen">
      <input class="drawer-toggle" id="main-drawer" type="checkbox" />

      <!-- CONTEÚDO PRINCIPAL (Drawer Content) -->
      <div class="drawer-content flex flex-col min-h-screen">

         <!-- NAVBAR SUPERIOR -->
         <header class="navbar bg-base-100 border-b border-base-300 px-4 lg:px-8 sticky top-0 z-30">
            <div class="flex-none lg:hidden">
               <label aria-label="Abrir menu lateral" class="btn btn-square btn-ghost" for="main-drawer">
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" />
                  </svg>
               </label>
            </div>

            <!-- Breadcrumb -->
            <div class="flex-1 px-2">
               <div class="text-xs breadcrumbs hidden sm:block">
                  <ul>
                     <li class="opacity-60">
                        <a class="flex items-center gap-1.5 hover:text-primary">
                           <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path
                                 d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                           </svg>
                           Geral
                        </a>
                     </li>
                     <li class="font-semibold text-base-content">Painel Principal</li>
                  </ul>
               </div>
               <span class="sm:hidden font-bold text-base">Painel Principal</span>
            </div>

            <!-- Ações Direita -->
            <div class="flex items-center gap-3">
               <!-- Busca -->
               <div class="relative hidden md:block w-64">
                  <input class="input input-bordered input-sm w-full pl-9 focus:input-primary text-xs"
                     placeholder="Buscar alunos, turmas..." type="text" />
                  <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none opacity-40">
                     <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" />
                     </svg>
                  </span>
               </div>

               <!-- Notificações -->
               <div class="dropdown dropdown-end">
                  <button aria-label="Notificações" class="btn btn-ghost btn-circle btn-sm" role="button" tabindex="0">
                     <div class="indicator">
                        <svg class="h-5 w-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        <span class="badge badge-primary badge-xs indicator-item">3</span>
                     </div>
                  </button>
                  <div
                     class="dropdown-content z-30 card card-compact w-80 p-2 shadow-lg bg-base-100 border border-base-300 mt-2"
                     tabindex="0">
                     <div class="card-body">
                        <div class="font-bold text-sm pb-2 border-b border-base-200 flex justify-between items-center">
                           <span>Notificações</span>
                           <span class="badge badge-sm badge-neutral">3 novas</span>
                        </div>
                        <ul class="space-y-1 text-xs py-1">
                           <li class="p-2 hover:bg-base-200 rounded-lg cursor-pointer transition-colors">
                              <p class="font-semibold text-base-content">Matrícula confirmada</p>
                              <p class="opacity-70 text-[11px]">Lucas Silveira no 9º Ano A.</p>
                           </li>
                           <li class="p-2 hover:bg-base-200 rounded-lg cursor-pointer transition-colors">
                              <p class="font-semibold text-base-content">Alerta de Frequência</p>
                              <p class="opacity-70 text-[11px]">Turma 7º Ano B abaixo de 80% hoje.</p>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>

               <!-- Perfil -->
               <div class="dropdown dropdown-end">
                  <div class="btn btn-ghost btn-circle avatar" role="button" tabindex="0">
                     <div class="w-8 rounded-full ring-2 ring-primary ring-offset-base-100 ring-offset-1">
                        <img alt="Foto Helena Ramos"
                           src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80" />
                     </div>
                  </div>
                  <ul class="menu menu-sm dropdown-content mt-3 z-30 p-2 shadow-lg bg-base-100 rounded-box w-52 border border-base-300"
                     tabindex="0">
                     <li class="menu-title px-4 py-2 border-b border-base-200">
                        <p class="font-semibold text-base-content">Profª. Helena Ramos</p>
                        <span class="text-[11px] text-primary font-medium">Coordenação Geral</span>
                     </li>
                     <li class="mt-1"><a>Meu Perfil</a></li>
                     <li><a>Configurações</a></li>
                     <div class="divider my-1"></div>
                     <li><a class="text-error">Sair do Sistema</a></li>
                  </ul>
               </div>
            </div>
         </header>

         <!-- CORPO DA PÁGINA (Onde o $slot é injetado) -->
         <main class="flex-1 p-6">
            {{ $slot }}
         </main>

      </div>

      <!-- SIDEBAR (DRAWER-SIDE) -->
      <div class="drawer-side z-40 border-r border-base-300">
         <label aria-label="Fechar menu" class="drawer-overlay" for="main-drawer"></label>
         <aside class="bg-base-100 w-64 min-h-screen flex flex-col justify-between p-4 border-r border-base-300">
            <div class="space-y-4">
               <!-- Logo -->
               <div class="flex items-center gap-3 px-2 py-1">
                  <img class="h-20 w-20 object-contain" src="/images/esjd.png" alt="Logo">
                  <div>
                     @foreach ($escolas as $escola)
                        <div class="font-bold text-sm leading-tight">{{ $escola->nome_fantasia ?? "Escola" }}</div>
                     @endforeach
                     <span class="text-[11px] text-primary font-medium">Gestão Acadêmica</span>
                  </div>
               </div>

               <div class="divider my-0"></div>

               <!-- Menu -->
               <ul class="menu menu-sm w-full gap-1 p-0">
                  <li class="menu-title text-[11px] uppercase tracking-wider opacity-60 px-2">Menu Principal</li>
                  <li>
                     <a class="active font-medium">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path
                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        Dashboard
                     </a>
                  </li>
                  <li>
                     <a class="flex justify-between font-medium">
                        <div class="flex items-center gap-2">
                           <svg class="h-4 w-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path
                                 d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                           </svg>
                           <span>Alunos</span>
                        </div>
                        <span class="badge badge-sm badge-ghost">1.2k</span>
                     </a>
                  </li>
                  <li>
                     <a class="font-medium">
                        <svg class="h-4 w-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        Turmas & Séries
                     </a>
                  </li>
                  <li>
                     <a class="font-medium">
                        <svg class="h-4 w-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        Boletim & Notas
                     </a>
                  </li>

                  <li class="menu-title text-[11px] uppercase tracking-wider opacity-60 px-2 mt-3">Sistema</li>
                  <li>
                     <a class="font-medium">
                        <svg class="h-4 w-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                           <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" />
                        </svg>
                        Configurações
                     </a>
                  </li>
               </ul>
            </div>

            <!-- Footer Sidebar -->
            <div class="p-3 bg-base-200/50 rounded-box border border-base-300">
               <p>Tema do sistema</p>
               <label class="flex cursor-pointer gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <circle cx="12" cy="12" r="5" />
                     <path
                        d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
                  </svg>
                  <input type="checkbox" value="synthwave" class="toggle theme-controller" />
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                  </svg>
               </label>
            </div>
            <div class="p-3 bg-base-200/50 rounded-box border border-base-300">
               <div class="flex items-center gap-2 mb-0.5">
                  <span class="w-2 h-2 rounded-full bg-success"></span>
                  <span class="text-xs font-semibold">Sistema Online</span>
               </div>
               <p class="text-[11px] opacity-60 leading-tight">Ano letivo em curso.</p>
            </div>
         </aside>
      </div>

   </div>
</body>