<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    { 
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\Textarea::make('short_description')->rows(3),
                Forms\Components\RichEditor::make('description')->columnSpanFull(),
                Forms\Components\TextInput::make('icon')->label('Icon Class (مثال: fa-solid fa-star)'),
                Forms\Components\FileUpload::make('featured_image')->image()->directory('services'),
                Forms\Components\TextInput::make('price_from')->numeric()->prefix('SAR'),
                Forms\Components\Textarea::make('features')->rows(4),
                Forms\Components\Toggle::make('is_featured')->label('Featured'),
                Forms\Components\TextInput::make('order')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
          return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('slug')->limit(20),
            Tables\Columns\TextColumn::make('short_description')->limit(30),
            Tables\Columns\ImageColumn::make('featured_image')->circular(),
            Tables\Columns\TextColumn::make('price_from')->money('SAR'),
            Tables\Columns\IconColumn::make('is_featured')->boolean(),
            Tables\Columns\TextColumn::make('order')->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
