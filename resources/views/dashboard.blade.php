<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistema: Bar') }}
        </h2>
    </x-slot>

	

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full rounded-md">
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Nome</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Endereço</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Telefone</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Estilo</th>
                <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Preço</th>
              <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800" colspan="3">
                Action</th>
            </tr>
          </thead>
          @foreach (Auth::user()->mySistemas as $sistema)
          <tbody class="bg-gray-800" x-data="{showDelete:false, showEdit:false}">
            
            <tr>
            
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-white">{{$sistema ->nome}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-white">{{$sistema ->endereco}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-white">{{$sistema ->telefone}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-white">{{$sistema ->estilo}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-white">{{$sistema ->preco}}
                </div>
              </td>

              <td class="font-medium text-center whitespace-no-wrap border-b border-gray-200 ">
              <div class="flex gap-2 flex-col">
                            <div>
                                <x-primary-button class="cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true">Deletar</x-primary-button>
                            </div>
                            <div>
                                <x-primary-button class="cursor-pointer px-2 bg-blue-500 text-white" @click="showEdit = true">Editar</x-primary-button>
                            </div>
                        </div>
                        <template x-if="showDelete">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Tem certeza?</h2>
                                    <div class="flex justify-between mt-4">
                                        <form action="{{ route('sistema.destroy', $sistema) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Deletar</x-danger-button>
                                        </form>
                                        <x-primary-button @click="showDelete = false">Cancelar</x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="showEdit">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Edição</h2>
                                        <form  class="my-4" action="{{ route('sistema.update', $sistema) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-text-input name="nome" placeholder="Nome" value="{{$sistema ->nome}}" />
                                            <x-text-input name="endereco" placeholder="Endereco" value="{{$sistema ->endereco}}" />
                                            <x-text-input name="telefone" placeholder="Telefone" value="{{$sistema ->telefone}}" />
                                            <select name="estilo" placeholder="Estilo">
                                                <option value="rock" @if($sistema -> estilo === 'rock') selected @endif>Rock</option>
                                                <option value="samba" @if($sistema -> estilo === 'samba') selected @endif>Samba</option>
                                                <option value="eletronica" @if($sistema -> estilo === 'eletronica') selected @endif>Eletrônica</option>
                                                <option value="kpop" @if($sistema -> estilo === 'kpop') selected @endif>Kpop</option>
                                                <option value="gospel" @if($sistema -> estilo === 'gospel') selected @endif>Gospel</option>
                                                <option value="outros" @if($sistema -> estilo === 'outros') selected @endif>Outros</option>

                                            <x-text-input name="preco" placeholder="Preco" value="{{$sistema ->preco}}" />
                                            <x-primary-button class="w-full text-center mt-2">Salvar</x-primary-button>
                                        </form>
                                        <x-danger-button @click="showEdit = false" class="w-full">Cancelar</x-danger-button>
                                </div>
                            </div>
                        </template>
            
          
                    </div>
              </td>
          </tbody>
        
              
                    @endforeach
                 </table>

                    <form action="{{ route('sistema.store') }}" method="POST">
                        @csrf
                        <x-text-input name="nome" placeholder="Nome" />
                        <x-text-input name="endereco" placeholder="Endereco" />
                        <x-text-input name="telefone" placeholder="Telefone" />
                        <select name="estilo" class="rounded-md">
                            <option value="rock">Rock</option>
                            <option value="samba">Samba</option>
                            <option value="eletronica">Eletrônica</option>
                            <option value="kpop">Kpop</option>
                            <option value="gospel">Gospel</option>
                            <option value="outros">Outros</option>
                        </select>

                        <x-text-input name="preco" placeholder="Preco" />
                        <x-primary-button>Salvar</x-primary-button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
