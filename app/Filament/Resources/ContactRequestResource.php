<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRequestResource\Pages;
use App\Filament\Resources\ContactRequestResource\RelationManagers;
use App\Models\ContactRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    
    protected static ?string $navigationLabel = 'طلبات التواصل';
    
    protected static ?string $pluralLabel = 'طلبات التواصل';
    
    protected static ?string $label = 'طلب تواصل';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->disabled(),
                    
                Forms\Components\TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->disabled(),
                    
                Forms\Components\TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->disabled(),
                    
                Forms\Components\TextInput::make('service_type')
                    ->label('نوع الخدمة')
                    ->disabled(),
                    
                Forms\Components\TextInput::make('subject')
                    ->label('موضوع الرسالة')
                    ->required()
                    ->disabled(),
                    
                Forms\Components\Textarea::make('message')
                    ->label('تفاصيل المشروع')
                    ->required()
                    ->disabled()
                    ->rows(4),
                    
                Forms\Components\Select::make('status')
                    ->label('حالة الطلب')
                    ->options([
                        'pending' => 'في الانتظار',
                        'in_progress' => 'قيد المعالجة',
                        'completed' => 'مكتملة',
                        'cancelled' => 'ملغية',
                    ])
                    ->required(),
                    
                Forms\Components\Textarea::make('admin_notes')
                    ->label('ملاحظات إدارية')
                    ->rows(3),
                    
                Forms\Components\DateTimePicker::make('responded_at')
                    ->label('تاريخ الرد'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('phone')
                    ->label('الهاتف'),
                    
                Tables\Columns\TextColumn::make('service_type')
                    ->label('نوع الخدمة')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'web' => 'موقع إلكتروني',
                        'mobile' => 'تطبيق جوال',
                        'system' => 'نظام إداري',
                        'other' => 'أخرى',
                        default => $state ?? 'غير محدد',
                    }),
                    
                Tables\Columns\TextColumn::make('subject')
                    ->label('الموضوع')
                    ->limit(30),
                    
                Tables\Columns\TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'in_progress' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'في الانتظار',
                        'in_progress' => 'قيد المعالجة',
                        'completed' => 'مكتملة',
                        'cancelled' => 'ملغية',
                        default => $state,
                    }),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإرسال')
                    ->dateTime()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('responded_at')
                    ->label('تاريخ الرد')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'في الانتظار',
                        'in_progress' => 'قيد المعالجة',
                        'completed' => 'مكتملة',
                        'cancelled' => 'ملغية',
                    ]),
                    
                Tables\Filters\SelectFilter::make('service_type')
                    ->label('نوع الخدمة')
                    ->options([
                        'web' => 'موقع إلكتروني',
                        'mobile' => 'تطبيق جوال',
                        'system' => 'نظام إداري',
                        'other' => 'أخرى',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('عرض'),
                Tables\Actions\EditAction::make()->label('تعديل'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListContactRequests::route('/'),
            'create' => Pages\CreateContactRequest::route('/create'),
            'edit' => Pages\EditContactRequest::route('/{record}/edit'),
        ];
    }
}
