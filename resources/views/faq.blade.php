<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- Cabeçalho da FAQ --}}
            <div class="bg-white border border-secondary rounded-lg shadow-sm p-8 mb-8">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-dark mb-4">Perguntas Frequentes</h1>
                    <p class="text-gray-600 text-lg">Encontre respostas para as dúvidas mais comuns sobre nossa plataforma</p>
                </div>
                
                {{-- Barra de busca --}}
                <div class="max-w-md mx-auto">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Buscar nas perguntas..." 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                               id="searchInput">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lista de FAQs --}}
            <div class="space-y-4" id="faqContainer">
                {{-- FAQ Item 1 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="conta">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como criar uma conta na plataforma?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Para criar uma conta, clique no botão "Criar conta" na página inicial. 
                                Preencha o formulário com suas informações pessoais, incluindo nome, email e senha. Será necessário incluir detalhes e os dados do seu pet para finalizar o cadastro.
                                Não se preocupe, você consegue alterar seus dados e incluir mais pets acessando o seu perfil.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="perfil">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como editar meu perfil?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Acesse o menu dropdown com seu nome no canto superior direito e selecione "Perfil". 
                                Na página do perfil, você pode editar suas informações pessoais, foto de perfil e 
                                outras configurações da conta. Não se esqueça de salvar as alterações.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="mensagens">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como enviar mensagens para outros usuários?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Para enviar mensagens, clique em "Mensagens" na navegação superior. Você pode iniciar a 
                                conversa clicando no nome da pessoa com a qual tem conexão. 
                                Digite sua mensagem no campo de texto e pressione Enter para enviar.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="conexoes">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como fazer conexões com outros usuários?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Acesse a seção "Painel de usuários" no menu dropdown com seu nome no canto superior direito para ver outros usuários. Você pode usar os filtros para achar um amigo ou procurar por pessoas com os mesmos interesses. Clique no perfil de interesse e 
                                utilize o botão "Conectar" para enviar uma solicitação de conexão. Você pode ver
                                solicitações pendentes na seção "Conexões" do menu dropdown.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="pets">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como adicionar um novo pet?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Na seção "Perfil", clique no botão com o símbolo + adicionar um novo pet. 
                                Clique em "Adicionar Pet" e preencha os dados como nome, idade, raça e características. 
                                Você também precisará adicionar foto para mostrar seu companheiro para outros usuários.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 6 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="seguranca">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como faço para excluir minha conta?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Acesse seu perfil clicando no menu dropdown com seu nome. Na página do perfil, 
                                procure pela seção "Editar perfil". Na página de edição, role até o final e 
                                clique no botão "Desativar conta". Perceba que ao desativar sua conta você será deslogado e precisará enviar um email solicitando a ativação de conta.
                                Se você deseja excluir permanentemente sua conta, entre em contato com o suporte através do email.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 7 --}}
                <div class="bg-white border border-secondary rounded-lg shadow-sm faq-item" data-category="suporte">
                    <div class="p-6">
                        <button class="w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-dark faq-question">Como entrar em contato com o suporte?</h3>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="mt-4 hidden faq-answer">
                            <p class="text-gray-600 leading-relaxed">
                                Se você não encontrou a resposta para sua dúvida aqui, pode entrar em contato conosco 
                                através do email admin@petlovers.com ou utilizando o formulário de contato disponível 
                                no rodapé da página. Nossa equipe responde em até 24 horas úteis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mensagem quando não há resultados --}}
            <div class="bg-white border border-secondary rounded-lg shadow-sm p-8 text-center hidden" id="noResults">
                <div class="text-gray-500">
                    <svg class="mx-auto h-12 w-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.562M15 6.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <h3 class="text-lg font-medium mb-2">Nenhum resultado encontrado</h3>
                    <p>Tente usar outras palavras-chave ou termos mais gerais.</p>
                </div>
            </div>

            {{-- Seção de Contato --}}
            <div class="bg-white border border-secondary rounded-lg shadow-sm p-8 mt-8">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-dark mb-4">Ainda tem dúvidas?</h2>
                    <p class="text-gray-600 mb-6">Nossa equipe está aqui para ajudar você com qualquer questão.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="mailto:admin@petlovers.com" 
                           class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-primary/90 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Enviar Email
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Função para alternar a visibilidade das respostas
        function toggleFAQ(button) {
            const answer = button.parentElement.querySelector('.faq-answer');
            const arrow = button.querySelector('svg');
            
            answer.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }

        // Função de busca
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            const noResults = document.getElementById('noResults');
            let hasResults = false;

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            if (hasResults) {
                noResults.classList.add('hidden');
            } else {
                noResults.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>