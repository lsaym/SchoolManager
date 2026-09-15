<x-patterView :$escolas>
   <main class="flex-1 p-4 lg:p-8 space-y-6 max-w-7xl w-full mx-auto">
      <!-- HEADER DE BOAS-VINDAS -->
      <section
         class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-base-100 p-6 rounded-box border border-base-300 shadow-sm">
         <div>
            <div class="flex items-center gap-2">
               <h1 class="text-xl sm:text-2xl font-bold tracking-tight">Painel Acadêmico</h1>
               <span class="badge badge-outline badge-sm font-semibold">Ano 2025</span>
            </div>
            <p class="text-xs sm:text-sm opacity-70 mt-1">
               Quarta-feira, 15 de Outubro de 2025 • Turno Matutino
            </p>
         </div>

         <div class="flex items-center gap-2.5">
            <button class="btn btn-sm btn-outline">
               Exportar
            </button>
            <button class="btn btn-sm btn-primary">
               + Nova Matrícula
            </button>
         </div>
      </section>

      <!-- STATS -->
      <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

         <div class="stats bg-base-100 border border-base-300 shadow-sm">
            <div class="stat p-4">
               <div class="stat-figure text-primary">
                  <div class="p-2.5 bg-primary/10 rounded-box">
                     <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                           d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                           stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                     </svg>
                  </div>
               </div>
               <div class="stat-title text-xs font-semibold uppercase tracking-wider opacity-60">Alunos Ativos
               </div>
               <div class="stat-value text-2xl text-primary font-bold mt-0.5">{{ $alunos->count() }}</div>
               <div class="stat-desc text-success font-medium mt-0.5">↗ 4.2% <span
                     class="opacity-60 text-base-content">vs
                     mês anterior</span></div>
            </div>
         </div>

         <div class="stats bg-base-100 border border-base-300 shadow-sm">
            <div class="stat p-4">
               <div class="stat-figure text-success">
                  <div class="p-2.5 bg-success/10 rounded-box">
                     <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" />
                     </svg>
                  </div>
               </div>
               <div class="stat-title text-xs font-semibold uppercase tracking-wider opacity-60">Frequência Média
               </div>
               <div class="stat-value text-2xl font-bold mt-0.5">94.8%</div>
               <div class="stat-desc text-success font-medium mt-0.5">+1.1% <span
                     class="opacity-60 text-base-content">acima da meta</span></div>
            </div>
         </div>

         <div class="stats bg-base-100 border border-base-300 shadow-sm">
            <div class="stat p-4">
               <div class="stat-figure text-info">
                  <div class="p-2.5 bg-info/10 rounded-box">
                     <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                           d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                           stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                     </svg>
                  </div>
               </div>
               <div class="stat-title text-xs font-semibold uppercase tracking-wider opacity-60">Turmas Ativas
               </div>
               <div class="stat-value text-2xl font-bold mt-0.5">contar turmas</div>
               <div class="stat-desc opacity-70 mt-0.5">Em 2 turnos letivos</div>
            </div>
         </div>

         <div class="stats bg-base-100 border border-base-300 shadow-sm">
            <div class="stat p-4">
               <div class="stat-figure text-warning">
                  <div class="p-2.5 bg-warning/10 rounded-box">
                     <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                           d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                           stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                     </svg>
                  </div>
               </div>
               <div class="stat-title text-xs font-semibold uppercase tracking-wider opacity-60">Pendências</div>
               <div class="stat-value text-2xl text-warning font-bold mt-0.5">7</div>
               <div class="stat-desc opacity-70 mt-0.5">Faltas e documentações</div>
            </div>
         </div>

      </section>

      <!-- CONTEÚDO PRINCIPAL (TABELA + PAINEL LATERAL) -->
      <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

         <!-- TABELA DE ALUNOS (2 Colunas) -->
         <div class="lg:col-span-2 card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body p-4 sm:p-6">

               <div
                  class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-base-200">
                  <div>
                     <h2 class="font-bold text-base text-base-content">Últimas Matrículas</h2>
                     <p class="text-xs opacity-60">Registros recentes de alunos na instituição</p>
                  </div>
                  <div class="flex items-center gap-2">
                     <select class="select select-bordered select-xs text-xs">
                        <option selected>Todas as Séries</option>
                        <option>Ensino Fundamental</option>
                        <option>Ensino Médio</option>
                     </select>
                     <button class="btn btn-ghost btn-xs text-primary font-bold">Ver todos</button>
                  </div>
               </div>

               <!-- Tabela DaisyUI -->
               <div class="overflow-x-auto">
                  <table class="table table-sm w-full">
                     <thead>
                        <tr class="text-xs opacity-70 border-b border-base-200">
                           <th>Aluno</th>
                           <th>Turma</th>
                           <th>Data</th>
                           <th>Status</th>
                           <th class="text-right">Ação</th>
                        </tr>
                     </thead>
                     <tbody class="text-xs">
                        <tr class="hover:bg-base-200/50">
                           <td>
                              <div class="flex items-center gap-3">
                                 <div class="avatar">
                                    <div class="w-8 h-8 rounded-full">
                                       <img
                                          src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80"
                                          alt="Lucas Silveira" />
                                    </div>
                                 </div>
                                 <div>
                                    <p class="font-semibold text-base-content">Lucas Silveira Mendes</p>
                                    <span class="text-[10px] opacity-60 font-mono">RA: #2025-0842</span>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <span class="font-medium">9º Ano A</span>
                              <div class="text-[10px] opacity-60">Fundamental</div>
                           </td>
                           <td>15/10/2025</td>
                           <td>
                              <span class="badge badge-success badge-sm badge-soft gap-1 text-[11px]">
                                 Ativo
                              </span>
                           </td>
                           <td class="text-right">
                              <button class="btn btn-ghost btn-xs btn-square" title="Ver detalhes">
                                 <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round"
                                       stroke-linejoin="round" stroke-width="2" />
                                    <path
                                       d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                 </svg>
                              </button>
                           </td>
                        </tr>

                        <tr class="hover:bg-base-200/50">
                           <td>
                              <div class="flex items-center gap-3">
                                 <div class="avatar">
                                    <div class="w-8 h-8 rounded-full">
                                       <img
                                          src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=100&auto=format&fit=crop&q=80"
                                          alt="Beatriz Souza" />
                                    </div>
                                 </div>
                                 <div>
                                    <p class="font-semibold text-base-content">Beatriz Souza Lima</p>
                                    <span class="text-[10px] opacity-60 font-mono">RA: #2025-0841</span>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <span class="font-medium">2º Ano B</span>
                              <div class="text-[10px] opacity-60">Médio</div>
                           </td>
                           <td>14/10/2025</td>
                           <td>
                              <span class="badge badge-success badge-sm badge-soft gap-1 text-[11px]">
                                 Ativo
                              </span>
                           </td>
                           <td class="text-right">
                              <button class="btn btn-ghost btn-xs btn-square" title="Ver detalhes">
                                 <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round"
                                       stroke-linejoin="round" stroke-width="2" />
                                    <path
                                       d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                 </svg>
                              </button>
                           </td>
                        </tr>

                        <tr class="hover:bg-base-200/50">
                           <td>
                              <div class="flex items-center gap-3">
                                 <div class="avatar">
                                    <div class="w-8 h-8 rounded-full">
                                       <img
                                          src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?w=100&auto=format&fit=crop&q=80"
                                          alt="Gabriel Antunes" />
                                    </div>
                                 </div>
                                 <div>
                                    <p class="font-semibold text-base-content">Gabriel Antunes Neto</p>
                                    <span class="text-[10px] opacity-60 font-mono">RA: #2025-0839</span>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <span class="font-medium">6º Ano C</span>
                              <div class="text-[10px] opacity-60">Fundamental</div>
                           </td>
                           <td>14/10/2025</td>
                           <td>
                              <span class="badge badge-warning badge-sm badge-soft gap-1 text-[11px]">
                                 Doc. Pendente
                              </span>
                           </td>
                           <td class="text-right">
                              <button class="btn btn-ghost btn-xs btn-square" title="Ver detalhes">
                                 <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round"
                                       stroke-linejoin="round" stroke-width="2" />
                                    <path
                                       d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                       stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                 </svg>
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>

            </div>
         </div>

         <!-- AVISOS & EVENTOS (1 Coluna) -->
         <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body p-4 sm:p-6">

               <div class="flex items-center justify-between pb-3 border-b border-base-200">
                  <h2 class="font-bold text-base text-base-content">Agenda Escolar</h2>
                  <span class="badge badge-sm badge-neutral">Esta semana</span>
               </div>

               <div class="space-y-3 mt-3">

                  <!-- Evento Item -->
                  <div class="flex items-start gap-3 p-2.5 rounded-box hover:bg-base-200/60 transition-colors">
                     <div
                        class="flex flex-col items-center justify-center bg-primary/10 text-primary px-2.5 py-1.5 rounded-box font-bold min-w-[46px]">
                        <span class="text-[10px] uppercase tracking-wider">Out</span>
                        <span class="text-base leading-none">16</span>
                     </div>
                     <div class="flex-1 min-w-0">
                        <h3 class="text-xs font-semibold truncate">Reunião de Pais & Mestres</h3>
                        <p class="text-[11px] opacity-70 truncate">Resultados do 3º bimestre</p>
                        <div class="flex items-center gap-1.5 mt-1 text-[10px] opacity-60">
                           <span>18h30 - 20h30</span>
                           <span>•</span>
                           <span>Auditório</span>
                        </div>
                     </div>
                  </div>

                  <!-- Evento Item -->
                  <div class="flex items-start gap-3 p-2.5 rounded-box hover:bg-base-200/60 transition-colors">
                     <div
                        class="flex flex-col items-center justify-center bg-base-300 text-base-content px-2.5 py-1.5 rounded-box font-bold min-w-[46px]">
                        <span class="text-[10px] uppercase tracking-wider">Out</span>
                        <span class="text-base leading-none">18</span>
                     </div>
                     <div class="flex-1 min-w-0">
                        <h3 class="text-xs font-semibold truncate">Feira de Ciências</h3>
                        <p class="text-[11px] opacity-70 truncate">Exposição do Ensino Médio</p>
                        <div class="flex items-center gap-1.5 mt-1 text-[10px] opacity-60">
                           <span>08h00 - 13h00</span>
                           <span>•</span>
                           <span>Quadra</span>
                        </div>
                     </div>
                  </div>

               </div>

               <div class="card-actions mt-4 pt-2">
                  <button class="btn btn-block btn-sm btn-outline text-xs">
                     + Adicionar Evento
                  </button>
               </div>

            </div>
         </div>

      </section>
   </main>
</x-patterView>