<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('logo')
                    ->label('شعار العميل')
                    ->image()
                    ->directory('clients/logos')
                    ->maxSize(1024), // الحجم بالكيلوبايت

                Forms\Components\Textarea::make('testimonial')
                    ->label('الشهادة / التقييم')
                    ->rows(3),

                Forms\Components\TextInput::make('client_position')
                    ->label('مسمى العميل / الوظيفة')
                    ->maxLength(255),

                Forms\Components\TextInput::make('website')
                    ->label('موقع العميل')
                    ->url()
                    ->maxLength(255),

                Forms\Components\Select::make('rating')
                    ->label('التقييم')
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ])
                    ->required(),

                Forms\Components\Toggle::make('is_featured')
                    ->label('مميز')
                    ->default(false),

                Forms\Components\TextInput::make('order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('الاسم')->sortable()->searchable(),

                Tables\Columns\ImageColumn::make('logo')->label('شعار العميل')->rounded(),

                Tables\Columns\TextColumn::make('testimonial')->label('الشهادة')->limit(50),

                Tables\Columns\TextColumn::make('client_position')->label('مسمى العميل'),

                Tables\Columns\TextColumn::make('website')->label('الموقع')->url('website'),

                Tables\Columns\BadgeColumn::make('rating')
                    ->label('التقييم')
                    ->colors([
                        'danger' => fn($state) => $state <= 2,
                        'warning' => fn($state) => $state == 3,
                        'success' => fn($state) => $state >= 4,
                    ]),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')->label('الترتيب')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
