<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationLabel = 'إعدادات الموقع';
    
    protected static ?string $pluralLabel = 'إعدادات الموقع';
    
    protected static ?string $label = 'إعداد';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('group')
                    ->label('المجموعة')
                    ->options([
                        'general' => 'عامة',
                        'contact' => 'التواصل',
                        'social' => 'وسائل التواصل',
                        'seo' => 'SEO',
                    ])
                    ->required(),
                    
                Forms\Components\TextInput::make('key')
                    ->label('المفتاح')
                    ->unique(ignoreRecord: true)
                    ->required(),
                    
                Forms\Components\TextInput::make('label')
                    ->label('الاسم')
                    ->required(),
                    
                Forms\Components\Select::make('type')
                    ->label('نوع البيانات')
                    ->options([
                        'text' => 'نص قصير',
                        'textarea' => 'نص طويل',
                        'number' => 'رقم',
                        'boolean' => 'نعم/لا',
                        'image' => 'صورة',
                    ])
                    ->required()
                    ->reactive(),
                    
                Forms\Components\TextInput::make('value')
                    ->label('القيمة')
                    ->visible(fn ($get) => in_array($get('type'), ['text', 'number'])),
                    
                Forms\Components\Textarea::make('value')
                    ->label('القيمة')
                    ->visible(fn ($get) => $get('type') === 'textarea'),
                    
                Forms\Components\Toggle::make('value')
                    ->label('القيمة')
                    ->visible(fn ($get) => $get('type') === 'boolean'),
                    
                Forms\Components\FileUpload::make('value')
                    ->label('الصورة')
                    ->image()
                    ->visible(fn ($get) => $get('type') === 'image'),
                    
                Forms\Components\Textarea::make('description')
                    ->label('الوصف'),
                    
                Forms\Components\TextInput::make('order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group')
                    ->label('المجموعة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'gray',
                        'contact' => 'success',
                        'social' => 'info',
                        'seo' => 'warning',
                        default => 'secondary',
                    }),
                    
                Tables\Columns\TextColumn::make('label')
                    ->label('الاسم')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('key')
                    ->label('المفتاح')
                    ->copyable()
                    ->fontFamily('mono'),
                    
                Tables\Columns\TextColumn::make('type')
                    ->label('النوع')
                    ->badge(),
                    
                Tables\Columns\TextColumn::make('value')
                    ->label('القيمة')
                    ->limit(50),
                    
                Tables\Columns\TextColumn::make('order')
                    ->label('الترتيب')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->label('المجموعة')
                    ->options([
                        'general' => 'عامة',
                        'contact' => 'التواصل',
                        'social' => 'وسائل التواصل',
                        'seo' => 'SEO',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف'),
                ]),
            ])
            ->defaultSort('order');
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
