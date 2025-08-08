<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form 
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\RichEditor::make('description')->columnSpanFull(),
            Forms\Components\FileUpload::make('featured_image')
                ->image()
                ->directory('portfolios')
                ->required(),
            Forms\Components\FileUpload::make('gallery')
                ->image()
                ->multiple()
                ->directory('portfolios/gallery')
                ->label('Gallery Images'),
            Forms\Components\TextInput::make('client_name')->label('Client Name'),
            Forms\Components\TextInput::make('project_url')->url()->label('Project URL'),
            Forms\Components\TextInput::make('category'),
            Forms\Components\TextInput::make('technologies')->hint('مثال: Laravel, Vue.js, MySQL'),
            Forms\Components\DatePicker::make('completion_date')->label('Completion Date'),
            Forms\Components\Toggle::make('is_featured')->label('Featured'),
            Forms\Components\TextInput::make('order')->numeric()->label('Display Order'),
        ]);
    }

    public static function table(Table $table): Table
    {
        
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('slug')->limit(20),
            Tables\Columns\ImageColumn::make('featured_image')->circular(),
            Tables\Columns\TextColumn::make('client_name')->limit(20),
            Tables\Columns\TextColumn::make('category'),
            Tables\Columns\TextColumn::make('technologies')->limit(30),
            Tables\Columns\TextColumn::make('completion_date')->date(),
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
